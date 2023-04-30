@extends('backend.master')
@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama lengkap</th>
                        <th>Jenis kelamin</th>
                        <th>Tanggal lahir</th>
                        <th>Usia</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->date_of_birth }}</td>
                        <td>{{ $item->age }}</td></td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('patient-edit', $item->id) }}">Edit</a>
                            <form action="{{route("patient-delete", $item->id)}}" method="post" style="display:inline" class="form-check-inline">
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
@extends('backend.master')
@section('content')
<div class="card shadow mb-4"> 
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ route('patient-create') }}"><button class="btn btn-info btn-circle"><i class="fa fa-plus" aria-hidden="true"></i></button></a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama lengkap</th>
                        <th>Jenis kelamin</th>
                        <th>Tanggal lahir</th>
                        <th>Usia</th>
                        <th>Alamat</th>
                        <th>Penyakit</th>
                        <th>Tanggal masuk</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->date_of_birth }}</td>
                        <td>{{ $item->age }}</td></td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->disease }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a class="btn btn-warning btn-circle" href="{{ route('patient-edit', $item->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{route("patient-delete", $item->id)}}" method="post" style="display:inline" class="form-check-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-circle" type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
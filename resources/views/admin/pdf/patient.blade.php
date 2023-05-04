<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
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
                        <td>{{ $item->disease->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

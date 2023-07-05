@extends('backend.master')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Hello, {{ Auth::user()->role }} Welcome back !</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Admin</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $cAdmin }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Pemimpin</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $cPemimpin }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Perawat
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $cPerawat }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Pengguna</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $cUser }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-address-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="grafikPasien"  width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        var dataPasien = @json($dataPasien);
    
        var labels = [];
        var values = [];
    
        // Menghitung jumlah pasien per penyakit
        var penyakitData = {};
        dataPasien.forEach(function(pasien) {
            if (penyakitData[pasien.disease]) {
                penyakitData[pasien.disease]++;
            } else {
                penyakitData[pasien.disease] = 1;
            }
        });
    
        // Membuat labels dan values dari data penyakit
        for (var disease in penyakitData) {
            labels.push(disease);
            values.push(penyakitData[disease]);
        }
    
        var ctx = document.getElementById('grafikPasien').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Pasien',
                    data: values,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                },
                elements: {
                line: {
                    tension: 0.4
                }
            }
            }
        });
    </script>
@endsection
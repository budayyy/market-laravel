@extends('layouts.main')

@section('content')
    
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Grafik Laporan Penjualan
                            </h3>
                            <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                <a class="nav-link active" href="#terbanyak-chart" data-toggle="tab">Stok Terbanyak</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#tertinggi-chart" data-toggle="tab">Harga Tertinggi</a>
                                </li>
                            </ul>
                            </div>
                        </div>
                        {{-- ./card-header --}}
                        <div class="card-body">
                            <div class="tab-content">
                            <div class="chart tab-pane active" id="terbanyak-chart"
                                style="position: relative; height: 400px;">
                                <canvas class="chartjs" id="terbanyakChart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                            </div>
                            <div class="chart tab-pane" id="tertinggi-chart" style="position: relative; height: 400px;">
                                <canvas id="tertinggiChart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                            </div>
                            </div>
                        </div>
                        {{-- ./card-body --}}
                    </div>
                </div>
                {{-- ./col-lg-9 --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                          <h3>{{ $total_terjual }}</h3>
                          <p>Laporan Penjualan</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-sort-amount-up nav-icon"></i>
                        </div>
                        <a href="/laporan/penjualan" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <div class="small-box bg-danger">
                        <div class="inner">
                          <h3>Rp.{{ $harga_total }}</h3>
                          <p>Penjualan Terbanyak</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-dollar-sign nav-icon"></i>
                        </div>
                        <a href="/laporan/terbanyak" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <div class="small-box bg-warning">
                        <div class="inner">
                          <h3>12</h3>
                          <p>Periode Penjualan</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-plus nav-icon"></i>
                        </div>
                        <a href="/laporan/periode" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{-- ./row --}}
            </div>
        </div>
    </section>

    <script>
        
        // chart terbanyak
        var ctx = document.getElementById("terbanyakChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($bulan); ?>,
                datasets: [{
                    label: 'Statistik Laporan',
                    backgroundColor: '#ADD8E6',
                    borderColor: '#93C3D2',
                    data: <?php echo json_encode($terbanyak); ?>
                }],
                option: {
                    animation: {
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }
                }
            },
        });

        // chart tertinggi
        var ctx = document.getElementById("tertinggiChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($bulan); ?>,
                datasets: [{
                    label: 'Statistik Laporan',
                    backgroundColor: '#ADD8E6',
                    borderColor: '#93C3D2',
                    data: <?php echo json_encode($tertinggi); ?>
                }],
                option: {
                    animation: {
                        onProgress: function(animation) {
                            progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                        }
                    }
                }
            },
        });
    </script>

@endsection



@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mx-auto">
            <!--informasi data dashboard-->
            <div class="row mb-2">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info h-100">
                        <div class="inner">
                            <h3>{{ $kecamatan }}</h3>

                            <p>Kecamatan Dengan Kasus Kecelekaan Terbanyak</p>
                        </div>


                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success h-100">
                        <div class="inner">
                            <h3>{{ $tanggal }}</h3>

                            <p>Tahun Dengan Kasus Kecelakaan Terbanyak</p>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6 ">
                    <!-- small box -->
                    <div class="small-box bg-warning h-100">
                        <div class="inner">
                            <span class="h3">{{ $sifat->count }} </span> {{ $sifat->sifat_cidera }}

                            <p>Jumlah Sifat Cidera Terbanyak</p>
                        </div>


                    </div>
                </div>
                <!-- ./col -->

            </div>
        </div>
        <div class="row">
            <section class="col-lg-7 connectedSortable">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Grafik Jumlah Total Kecelakaan Per Kecamatan dari Tahun 2019

                        </h3>

                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <!-- Morris chart - Sales -->
                            <div class="chart tab-pane active" id="grafik1-button"
                                style="position: relative; height: 300px;">
                                <canvas id="grafik1" height="300" style="height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Grafik Jumlah Total Kecelakaan Per Tahun
                        </h3>

                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="chart tab-pane active" id="grafik2-button" style="position: relative; height: 300px;">
                            <canvas id="grafik2" height="300" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </section>
            <section class="col-lg-5 connectedSortable">
                <div class="card bg-gradient-primary">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            <i class="fas fa-map-marker-alt mr-1"></i>
                            Maps
                        </h3>

                    </div>
                    <div class="card-body">
                        <div id="map" style="height: 300px; width: 100%;"></div>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
@section('styles')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <style>
        .leaflet-control-attribution {
            display: none !important
        }

        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }

        .legend {
            text-align: left;
            line-height: 18px;
            color: #555;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
    </style>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"
        integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        /*grafik kecematan*/
        var labels = {!! json_encode($kec) !!};
        const data = {
            labels: labels,
            datasets: [{
                label: 'Jumlah Kecelakaan',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: {!! json_encode($kasus) !!},

            }],
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: {
                        min: 0,
                        ticks: {
                            stepSize: 5
                        }
                    }
                }
            }
        };
        const myChart = new Chart(
            document.getElementById('grafik1'),
            config
        );
    </script>
    <script>
        /*grafik tahun*/
        var labels2 = {!! json_encode($tahun) !!};
        const data2 = {
            labels: labels2,
            datasets: [{
                label: 'Jumlah Kecelakaan',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: {!! json_encode($jumlah) !!},

            }],
        };

        const config2 = {
            type: 'line',
            data: data2,
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: {
                        min: 0,
                        ticks: {
                            stepSize: 5
                        }
                    }
                }
            }
        };
        const myChart2 = new Chart(
            document.getElementById('grafik2'),
            config2
        );
    </script>

    <!-- Leaflet JavaScript -->
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"
        integrity="sha512-Abr21JO2YqcJ03XGZRPuZSWKBhJpUAR6+2wH5zBeO4wAw4oksr8PRdF+BKIRsxvCdq+Mv4670rZ+dLnIyabbGw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('storage/js/heatmap/build/heatmap.min.js') }}"></script>
    <script src="{{ asset('storage/js/leaflet-heatmap.js') }}"></script>
    <script type="text/javascript">
        var s = [5.554630942893766, 95.31709742351293];
        var color = {!! json_encode($color) !!};
        var datamap = {!! json_encode($data) !!}
        var coor = {!! json_encode($coor2) !!}
        var map = L.map('map').setView(
            s, 12
        );


        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

       var dataMap = {
            data: coor
        };
        /*radius*/
        var cfg = {
            "radius":0.001,
            "maxOpacity": .8,
            "scaleRadius": true,
            "useLocalExtrema": true,
            latField: 'lat',
            lngField: 'lng',
            valueField: 'count'
        };


        var heatmapLayer = new HeatmapOverlay(cfg);
        heatmapLayer.setData(dataMap);
        heatmapLayer.addTo(map);
    </script>
@endpush

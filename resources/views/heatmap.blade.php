@extends('layouts.app')

@section('content')
    <style>
        input[type="range"] {
            -webkit-appearance: slider-vertical;
        }
    </style>
    <div class="container">
        <div class="card p-4">
            <div class="row">
                <div class="col-md-3">
                    <!--pilihan radius heatmap-->
                    <select class="form-control float-right m-2" id="radius">
                        <option value="">--Pilih Radius--</option>
                        <option {{ $radius == '0.005' ? 'selected' : '' }} value="0.005">1/2 km</option>
                        <option {{ $radius == '0.01' ? 'selected' : '' }} value="0.01">1 km</option>
                        <option {{ $radius == '0.015' ? 'selected' : '' }} value="0.015">1 1/2 km</option>
                        <option {{ $radius == '0.02' ? 'selected' : '' }} value="0.02">2 km</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <!--pilihan tahun heatmap-->
                    <select class="form-control float-right m-2" id="tahun">
                        <option value="">--Lihat Semua--</option>
                        @foreach ($tahunList as $item)
                            <option value="{{ $item->tanggal }}" {{ $tahun == $item->tanggal ? 'selected' : '' }}>
                                {{ $item->tanggal }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <div class="text-end">
                       
                        <button id="printBtn" class="btn btn-success">Cetak Peta</button>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-11">

                    <div id="map"></div>
                </div>
                <div class="col-lg-1">
                    <input id="opacity" type="range" class="form-control mt-4 w-50 h-50" min="0" max="1"
                        value="0.5" step="0.1">
                </div>
            </div>
        </div>

    </div>
@endsection
@section('styles')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <style>
        #map {
            min-height: 500px;
        }

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
    <script>
        $('#radius').change(function() {
            window.location.href = '/heatmap/' + this.value + "/"
            {{ $tahun ? '+' . $tahun : '' }};
        });
        $('#tahun').change(function() {
            window.location.href = '/heatmap/' + {{ $radius }} + "/" + this.value;
        });
    </script>
    <script src="https://www.jqueryscript.net/demo/jQuery-Plugin-To-Print-Any-Part-Of-Your-Page-Print/jQuery.print.js">
    </script>

    <!-- Leaflet JavaScript -->
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"
        integrity="sha512-Abr21JO2YqcJ03XGZRPuZSWKBhJpUAR6+2wH5zBeO4wAw4oksr8PRdF+BKIRsxvCdq+Mv4670rZ+dLnIyabbGw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.heat/0.2.0/leaflet-heat.js"></script>

    <script src="{{ asset('storage/js/heatmap/build/heatmap.min.js') }}"></script>
    <script src="{{ asset('storage/js/leaflet-heatmap.js') }}"></script>
    <script type="text/javascript">
        var s = [5.554630942893766, 95.31709742351293];
        var color = {!! json_encode($color) !!};
        var data = {!! json_encode($data) !!}
        var coor = {!! json_encode($coor) !!}
        var map = L.map('map').setView(
            s, 11
        );


        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 18
        }).addTo(map);


        var info = L.control();

        info.onAdd = function(map) {
            this._div = L.DomUtil.create('div', 'info');
            this.update();
            return this._div;
        };
        //menampilkan pop up info tematik
        info.update = function(props) {
            this._div.innerHTML = '<h4>Kecamatan</h4>' + (props ?
                '<b>' + props.NAMOBJ + '</b><br />' + props.MhsSIF + ' orang' :
                'Gerakkan mouse Anda');
        };
        var dataMap = {
            data: coor
        };
        /*radius*/
        var cfg = {
            "radius": {!! json_encode($radius) !!},
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
        $('#opacity').change(function() {
            $(".heatmap-canvas").css("opacity", this.value);
        });
        //memunculkan highlight pada peta
        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 5,
                color: '#666',
                dashArray: '',
                fillOpacity: 0.7
            });

            if (!L.Browser.ie && !L.Browser.opera) {
                layer.bringToFront();
            }

            info.update(layer.feature.properties);
        }
        for (var i = 0; i < data.length; i++) {
            marker = new L.marker([data[i][1], data[i][2]])
                .bindPopup(data[i][3] + "<br>" + data[i][0] + "<br> Jumlah Korban " + data[i][4])
                .addTo(map);
        }

        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: zoomToFeature
            });
        }

        var legend = L.control({
            position: 'bottomright'
        });
        $("#printBtn").click(function() {
            window.print();
        });
    </script>
@endpush

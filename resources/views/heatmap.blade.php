@extends('layouts.app')

@section('content')
    <style>
        .tematik input[type="range"] {
            -webkit-appearance: slider-horizontal;
        }

        .heatmap input[type="range"] {
            -webkit-appearance: slider-vertical;
        }
    </style>
    <div class="container">
        <div class="card p-4">
            <div class="row">
                <div class="col-md-3">
                    <label for="">Pilih Radius</label>
                    <!--pilihan radius heatmap-->
                    <select class="form-control float-right m-2" id="radius">
                        <option value="">--Pilih Radius--</option>
                        <option {{ $radius == '0.001' ? 'selected' : '' }} value="0.001">100 m</option>
                        <option {{ $radius == '0.002' ? 'selected' : '' }} value="0.002">200 m</option>
                        <option {{ $radius == '0.003' ? 'selected' : '' }} value="0.003">300 m</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">Pilih Tahun</label>
                    <!--pilihan tahun heatmap-->
                    <select class="form-control float-right m-2" id="tahun">
                        <option value="">--Lihat Semua--</option>
                        @foreach ($tahunList as $item)
                            <option value="{{ $item->tanggal }}" {{ $tahun == $item->tanggal ? 'selected' : '' }}>
                                {{ $item->tanggal }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5 pt-3">
                    <div class="text-end mt-6">
                        <button id="btn_tematik" class="btn btn-primary"></button>
                        <!--sembunyikan titik pada heatmap-->
                        @if (!$show)
                            @if ($tahun)
                                <a href="{{ route('heatmap', ['show' => 1, 'tahun' => $tahun, 'radius' => $radius]) }}"
                                    class="btn btn-primary">Sembunyikan Titik</a>
                            @elseif($radius)
                                <a href="{{ route('heatmap', ['show' => 1, 'tahun' => $tahun, 'radius' => $radius]) }}"
                                    class="btn btn-primary">Sembunyikan Titik</a>
                            @else
                                <a href="{{ route('heatmap', ['show' => 1]) }}" class="btn btn-primary">Sembunyikan
                                    Titik</a>
                            @endif
                        @else
                            @if ($tahun)
                                <a href="{{ route('heatmap', ['show' => 0, 'tahun' => $tahun, 'radius' => $radius]) }}"
                                    class="btn btn-primary">Tampil Titik</a>
                            @elseif($radius)
                                <a href="{{ route('heatmap', ['show' => 0, 'tahun' => $tahun, 'radius' => $radius]) }}"
                                    class="btn btn-primary">Tampil Titik</a>
                            @else
                                <a href="{{ route('heatmap', ['show' => 0]) }}" class="btn btn-primary">Tampil
                                    Titik</a>
                            @endif
                        @endif
                        <button id="printBtn" class="btn btn-primary">Cetak Peta</button>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-11">

                    <div id="map"></div>
                </div>
                <div class="col-lg-1">
                    <p style="font-size: 13px">Opacity Heatmap</p>
                    <div class="heatmap d-flex h-100">
                        <input id="opacity" type="range" class="form-control h-50 " min="0" max="1"
                            value="0" step="0.1" list="tickmarks">
                        <datalist id="tickmarks" class="h-50">
                            <option value="1" label="1"></option>
                            <option value="0.9" label="0.9"></option>
                            <option value="0.8" label="0.8"></option>
                            <option value="0.7" label="0.7"></option>
                            <option value="0.6" label="0.6"></option>
                            <option value="0.5" label="0.5"></option>
                            <option value="0.4" label="0.4"></option>
                            <option value="0.3" label="0.3"></option>
                            <option value="0.2" label="0.2"></option>
                            <option value="0.1" label="0.1"></option>
                            <option value="0" label="0"></option>
                        </datalist>
                    </div>
                </div>
            </div>
            <div>
                <p>Opacity Batas</p>
                <div class="d-block w-50 tematik">
                    <input id="opacity2" type="range" class="form-control w-100 " min="0" max="1"
                        value="1" step="0.1" list="tickmarks2">
                    <datalist id="tickmarks2" class="w-100">
                        <option value="0" label="0"></option>
                        <option value="0.1" label="0.1"></option>
                        <option value="0.2" label="0.2"></option>
                        <option value="0.3" label="0.3"></option>
                        <option value="0.4" label="0.4"></option>
                        <option value="0.5" label="0.5"></option>
                        <option value="0.6" label="0.6"></option>
                        <option value="0.7" label="0.7"></option>
                        <option value="0.8" label="0.8"></option>
                        <option value="0.9" label="0.9"></option>
                        <option value="1" label="1"></option>
                    </datalist>
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
        .leaflet-zoom-hide {
            z-index: 600;
        }

        .tematik datalist {
            display: flex;
            justify-content: space-between;
        }

        .heatmap datalist {
            display: grid;
            justify-content: space-between;
        }

        #map {
            min-height: 500px;
        }

        .leaflet-control-attribution {
            display: none !important
        }

        .info {
            padding: 6px 8px;
            font: 12px Arial, Helvetica, sans-serif;
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

        /* ukuran legenda */
        .leaflet-control {
            max-height: 10rem;
            overflow-y: auto
        }
    </style>
@endsection

@push('scripts')
    <script>
        $('#radius').change(function() {
            window.location.href = '/heatmap/' + {{ $show }} + '/' + this.value + "/"
            {{ $tahun ? '+' . $tahun : '' }};
        });
        $('#tahun').change(function() {
            window.location.href = '/heatmap/' + {{ $show }} + '/' + {{ $radius }} + "/" + this
                .value;
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
        var show = {!! json_encode($show) !!}
        var kecamatan = {!! json_encode($kecamatan) !!}
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

        function style(feature) {
            return {
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0,
                fillColor: color[feature.properties.NAMOBJ]
            };

        }
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

        if (show != 1) {
            for (var i = 0; i < data.length; i++) {
                marker = new L.marker([data[i][1], data[i][2]])
                    .bindPopup(data[i][3] + "<br>" + data[i][0] + "<br> Jumlah Korban " + data[i][4] + "<br> Tahun " + data[
                        i][
                        5
                    ])
                    .addTo(map);

            }
        }

        var mapZoomLevel = localStorage.theZoom;
        var mapCenterLat = localStorage.mapCenterLat;
        var mapCenterLng = localStorage.mapCenterLng;
        console.log(mapCenterLng)
        if (isNaN(mapZoomLevel)) {
            mapZoomLevel = 12;
        }


        //simpan titik saat refresh
        map.on('zoomend', function(e) {
            localStorage.theZoom = map.getZoom();
        });
        map.on('moveend', function(e) {
            localStorage.mapCenterLat = map.getCenter().lat;
            localStorage.mapCenterLng = map.getCenter().lng;
        });
        map.setZoom(mapZoomLevel);
        map.panTo(new L.LatLng(mapCenterLat, mapCenterLng));

        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        var geojson;

        function resetHighlight(e) {
            geojsonLayer.resetStyle(e.target);
            info.update();
        }

        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        function onEachFeature(feature, layer) {
            layer.on({
                click: zoomToFeature
            });
        }
        var geojsonLayer = new L.GeoJSON.AJAX({!! json_encode($geofile) !!}, {
            style: style,
            onEachFeature: onEachFeature
        });
        //pemanggilan maps
        geojsonLayer.addTo(map);
        $('#opacity2').change(function() {
            geojsonLayer.setStyle({
                fillOpacity: this.value
            });
        });
        var btn_tematik = document.getElementById('btn_tematik');
        btn_tematik.innerHTML = 'Tampilkan Batas';
        var state = false;
        var opacity = document.getElementById('opacity2').value;
        $('#btn_tematik').click(function() {
            if (state) {
                geojsonLayer.setStyle({
                    fillOpacity: 0
                });
                btn_tematik.innerHTML = 'Tampilkan Batas';
                state = false;

            } else {
                geojsonLayer.setStyle({
                    fillOpacity: opacity
                });
                btn_tematik.innerHTML = 'Sembunyikan Batas';
                state = true;
            }
        });
        var legend = L.control({
            position: 'bottomright'
        });

        //pemanggilan legend
        legend.onAdd = function(map) {

            var div = L.DomUtil.create('div', 'info legend'),
                grades = [0, 12, 25, 37, 50, 62, 75, 87], //pretty break untuk 8
                from, to;
            labels = []
            for (var i = 0; i < kecamatan.length; i++) {
                labels.push(
                    '<i style="background:' + color[kecamatan[i]] + '"></i> - ' + kecamatan[i]);
            }

            div.innerHTML = '<h5>Legenda:</h5>' + labels.join('<br>');
            return div;
        };

        legend.addTo(map);
        $("#printBtn").click(function() {
            window.print();
        });
    </script>
@endpush

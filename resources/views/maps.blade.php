@extends('layouts.app')

@section('content')
    <style>
        input[type="range"] {
            -webkit-appearance: slider-vertical;
        }
    </style>
    <div class="container">
        <div class="card p-4">
            <!--pilihan tahun maps-->
            <select class="form-control float-right m-2" id="tahun">
                <option value="" selected>--Lihat Semua--</option>
                @foreach ($tahunList as $item)
                    <option value="{{ $item->tanggal }}" {{ $tahun == $item->tanggal ? 'selected' : '' }}>
                        {{ $item->tanggal }}
                    </option>
                @endforeach
            </select>
            <div class="row">
                <div class="col-lg-11">
                    <div class="text-end">
                        <!--cetak peta-->
                        <button id="printBtn" class="btn btn-primary mb-2">Cetak Peta</button>
                    </div>
                    <div id="map"></div>
                </div>
                <div class="col-lg-1">
                    <!--opacity atau transparansi-->
                    <input id="opacity" type="range" class="form-control mt-4 w-50 h-50 bg-success" min="0"
                        max="1" value="0.5" step="0.1">
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

        /* ukuran legenda */
        .leaflet-control {
            max-height: 10rem;
            overflow-y: auto
        }
    </style>
@endsection

@push('scripts')
    <script>
        $('#tahun').change(function() {
            window.location.href = '/maps/' + this.value;
        });
        $("#printBtn").click(function() {
            window.print();
        });
    </script>
    <script src="https://www.jqueryscript.net/demo/jQuery-Plugin-To-Print-Any-Part-Of-Your-Page-Print/jQuery.print.js">
    </script>
    <!-- Leaflet JavaScript -->
    <!-- memanggil library leaflet -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"
        integrity="sha512-Abr21JO2YqcJ03XGZRPuZSWKBhJpUAR6+2wH5zBeO4wAw4oksr8PRdF+BKIRsxvCdq+Mv4670rZ+dLnIyabbGw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-search@2.3.7/dist/leaflet-search.src.css" />
    <script src="https://unpkg.com/leaflet-search@2.3.7/dist/leaflet-search.src.js"></script>
    <script type="text/javascript">
        /*cetak peta*/
        /*mendeklar posisi awal ttitik fokus peta*/
        var s = [5.554630942893766, 95.31709742351293];
        var color = {!! json_encode($color) !!};
        var data = {!! json_encode($data) !!}
        var kecamatan = {!! json_encode($kecamatan) !!}
        var map = L.map('map').setView(
            s, 11
        );
        //API open streetmap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);


        var info = L.control();
        //mendeklar map ke html
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

        info.addTo(map);

        function style(feature) {
            return {
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7,
                fillColor: color[feature.properties.NAMOBJ]
            };

        }
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
        //pop up koordinat
        for (var i = 0; i < data.length; i++) {
            marker = new L.marker([data[i][1], data[i][2]])
                .bindPopup(data[i][3] + "<br>" + data[i][0] + "<br> Jumlah Korban " + data[i][4] + "<br> Tahun " + data[i][
                    5
                ])
                .addTo(map);
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
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: zoomToFeature
            });
        }
        var geojsonLayer = new L.GeoJSON.AJAX({!! json_encode($geofile) !!}, {
            style: style,
            onEachFeature: onEachFeature
        });
        //pemanggilan maps
        geojsonLayer.addTo(map);
        $('#opacity').change(function() {
            geojsonLayer.setStyle({
                fillOpacity: this.value
            });
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

            div.innerHTML = '<h4>Legenda:</h4>' + labels.join('<br>');
            return div;
        };

        legend.addTo(map);

        var controlSearch = new L.Control.Search({
            position: 'topleft',
            layer: geojsonLayer,
            initial: false,
            zoom: 12,
            marker: false,
            propertyName: 'NAMOBJ',
            autoType: false,
            marker: {
                icon: false
            }

        });


        map.addControl(controlSearch);
    </script>
@endpush

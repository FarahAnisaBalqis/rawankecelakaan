<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--

Template 2091 Ziggy

http://www.tooplate.com/view/2091-ziggy

-->
    <title>Rawan Kecelakaan Kota Banda Aceh dan Sekitarnya</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('storage/css/tooplate-style.css') }}" rel="stylesheet">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>

    <style>
        input[type="range"] {
            -webkit-appearance: slider-vertical;
            background-color: #9a905d;
        }
    </style>
    <section class="w-100" style="background-color: #2B333F">
        <a href="{{ route('login') }}" class="text-decoration-none text-white m-4 py-1 btn btn-outline-light me-2">
            <h5>Log in</h5>
        </a>
        <a href="{{ route('Map user') }}" class="text-decoration-none text-white m-4 py-1 me-2 btn">
            <h5>Maps</h5>
        </a>
        <a href="{{ route('heatmap user', ['show' => 1, 'radius' => 0.001]) }}"
            class="text-decoration-none text-white m-4 py-1 me-2 btn" style="border-bottom:1px solid white;">
            <h5>Heatmaps</h5>
        </a>
        <a href="{{ route('Data user') }}" class="text-decoration-none text-white m-4 py-1 me-2 btn">
            <h5>Data</h5>
        </a>
        <a href="{{ route('panduan-user') }}" class="text-decoration-none text-white m-4 py-1 me-2 btn">
            <h5>Panduan</h5>
        </a>
        <a href="/" class="text-decoration-none text-white m-4 py-1 me-2 btn">
            <h5>Home</h5>
        </a>
    </section>

    <section class="second-section p-0">

        <div class="card m-4" style="background-color: #2B333F">
            <div class="card-header border-0">
                <h3 class="card-title text-white">
                    <i class="fas fa-map-marker-alt mr-1 "></i>
                    Heatmaps
                </h3>

            </div>
            <div class="card-body bg-white">
                <div class="row">
                    <div class="col-md-3">
                        <!--pilihan radius heatmap-->
                        <select class="form-control float-right m-2" id="radius">
                            <option value="">--Pilih Radius--</option>
                            <option {{ $radius == '0.001' ? 'selected' : '' }} value="0.001">100 m</option>
                            <option {{ $radius == '0.002' ? 'selected' : '' }} value="0.002">200 m</option>
                            <option {{ $radius == '0.003' ? 'selected' : '' }} value="0.003">300 m</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <!--pilihan tahun heatmap-->
                        <select class="form-control float-right m-2" id="tahun">
                            <option value="">--Lihat Semua--</option>
                            @foreach ($tahunList as $item)
                                <option value="{{ $item->tanggal }}"
                                    {{ $tahun == $item->tanggal ? 'selected' : '' }}>
                                    {{ $item->tanggal }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <div class="text-end">
                            @if (!$show)
                                @if ($tahun)
                                    <a href="{{ route('heatmap user', ['show' => 1, 'tahun' => $tahun, 'radius' => $radius]) }}"
                                        class="btn btn-primary">Sembunyikan Titik</a>
                                @elseif($radius)
                                    <a href="{{ route('heatmap user', ['show' => 1, 'tahun' => $tahun, 'radius' => $radius]) }}"
                                        class="btn btn-primary">Sembunyikan Titik</a>
                                @else
                                    <a href="{{ route('heatmap user', ['show' => 1]) }}"
                                        class="btn btn-primary">Sembunyikan
                                        Titik</a>
                                @endif
                            @else
                                @if ($tahun)
                                    <a href="{{ route('heatmap user', ['show' => 0, 'tahun' => $tahun, 'radius' => $radius]) }}"
                                        class="btn btn-primary">Tampil Titik</a>
                                @elseif($radius)
                                    <a href="{{ route('heatmap user', ['show' => 0, 'tahun' => $tahun, 'radius' => $radius]) }}"
                                        class="btn btn-primary">Tampil Titik</a>
                                @else
                                    <a href="{{ route('heatmap user', ['show' => 0]) }}" class="btn btn-primary">Tampil
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
                        <input id="opacity" type="range" class="form-control mt-4 w-50 h-50" min="0"
                            max="1" value="0.5" step="0.1">
                    </div>
                </div>
            </div>

        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-white">Jasa Raharja </h4>

                </div>
            </div>
        </div>
    </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>
</body>

</html>
<script>
    $('#radius').change(function() {
        window.location.href = '/heatmap-user/' + {{ $show }} + '/' + this.value + "/"
        {{ $tahun ? '+' . $tahun : '' }};
    });
    $('#tahun').change(function() {
        window.location.href = '/heatmap-user/' + {{ $show }} + '/' + {{ $radius }} + "/" + this
            .value;
    });
</script>
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
        //pop up koordinat
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
        mapZoomLevel = 12; //default
    }


    //store
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

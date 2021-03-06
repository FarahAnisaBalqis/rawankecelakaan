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
    <title>Ziggy HTML Template</title>
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


    <section class="w-100" style="background-color: #2B333F">
        <a href="{{ route('login') }}" class="text-decoration-none text-white m-4 py-1 btn btn-outline-light me-2">
            <h5>Log in</h5>
        </a>
        <a href="{{ route('heatmap user',['show'=>1,'radius'=>0.001]) }}" class="text-decoration-none text-white m-4 py-1 me-2 btn">
            <h5>Maps</h5>
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
    <style>
        input[type="range"] {
            -webkit-appearance: slider-vertical;
        }
    </style>
    <section class="second-section p-0">

        <div class="card m-4" style="background-color: #2B333F">
            <div class="card-header border-0">
                <h3 class="card-title text-white">
                    <i class="fas fa-map-marker-alt mr-1 "></i>
                    Maps
                </h3>

            </div>
            <div class="card-body bg-white">
                <!--pilihan tahun maps-->
                <select class="form-control float-right m-2 w-25" id="tahun">
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
                        <!--opacity atau tembus pandang-->
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
    $('#tahun').change(function() {
        window.location.href = '/maps-user/' + this.value;
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
    .leaflet-control {
            max-height: 10rem;
            overflow-y: auto
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
<link rel="stylesheet" href="https://unpkg.com/leaflet-search@2.3.7/dist/leaflet-search.src.css" />
<script src="https://unpkg.com/leaflet-search@2.3.7/dist/leaflet-search.src.js"></script>
<script type="text/javascript">
    var s = [5.554630942893766, 95.31709742351293];
    var color = {!! json_encode($color) !!};
    var datamap = {!! json_encode($data) !!}
    var kecamatan = {!! json_encode($kecamatan) !!}
    var map = L.map('map').setView(
        s, 11
    );


    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
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
    for (var i = 0; i < datamap.length; i++) {
        marker = new L.marker([datamap[i][1], datamap[i][2]])
            .bindPopup(datamap[i][3] + "<br>" + datamap[i][0] + "<br> Jumlah Korban " + datamap[i][4]+ "<br> Tahun "+datamap[i][5])
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
    geojsonLayer.addTo(map);
    $('#opacity').change(function() {
        geojsonLayer.setStyle({
            fillOpacity: this.value
        });
    });
    var legend = L.control({
        position: 'bottomright'
    });
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
     $("#printBtn").click(function() {
            window.print();
        });
</script>

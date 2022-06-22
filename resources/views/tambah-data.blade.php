@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4">
            <form action="{{ route('data kecelakaan') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat</label>
                            <input name="alamat" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <select class="form-select" name="kecamatan" required>
                                <option value="">Pilih Kecamatan</option>
                                @foreach ($tematik as $kecamatan)
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Kecelakaan</label>
                            <input name="jumlah" type="number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tahun Data</label>
                            <select class="form-control" name="tanggal">
                                <option value="">--Pilih Tahun--</option>
                                @for ($year = (int) date('Y'); 2019 <= $year; $year--)
                                    <option value="<?= $year ?>"><?= $year ?></option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Masukkan Gambar</label>
                            <input name="gambar" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Longitude</label>
                            <input id="longitude" name="long" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Latitude</label>
                            <input id="latitude" name="lat" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="container mt-4" id="mapid"></div>
                <button class="btn btn-primary float-end mt-4" type="submit">Tambah</button>
            </form>
        </div>

    </div>
@endsection
@section('styles')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <style>
        #mapid {
            min-height: 500px;
        }
    </style>
@endsection

@push('scripts')
    <!-- Leaflet JavaScript -->
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <script>
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }

        function showPosition(position) {
            let latPoint = position.coords.latitude;
            let longPoint = position.coords.longitude;
           
            var mapCenter = [
                {{ config('leafletsetup.map_center_latitude') }},
                {{ config('leafletsetup.map_center_longitude') }},
            ];
            var map = L.map('mapid').setView(mapCenter, {{ config('leafletsetup.zoom_level') }});
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            var marker = L.marker(mapCenter).addTo(map);

            function updateMarker(lat, lng) {
                marker
                    .setLatLng([lat, lng])
                    .bindPopup("Your location :" + marker.getLatLng().toString())
                    .openPopup();
                return false;
            };
             $('#latitude').val(latPoint);
            $('#longitude').val(longPoint);
            updateMarker(latPoint, longPoint);
            map.on('click', function(e) {
                let latitude = e.latlng.lat.toString().substring(0, 15);
                let longitude = e.latlng.lng.toString().substring(0, 15);
                $('#latitude').val(latitude);
                $('#longitude').val(longitude);
                updateMarker(latitude, longitude);
            });
            var updateMarkerByInputs = function() {
                return updateMarker($('#latitude').val(), $('#longitude').val());
            }
            $('#latitude').on('input', updateMarkerByInputs);
            $('#longitude').on('input', updateMarkerByInputs);
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation."
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred."
                    break;
            }
        }
    </script>
@endpush

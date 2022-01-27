@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card p-4">
            <form action="{{ route('data kecelakaan2') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <select class="form-select" name="tematik_id" required>
                                <option value="">Pilih Kecamatan</option>
                                @foreach ($tematik as $kecamatan)
                                <option value="{{$kecamatan->id}}">{{$kecamatan->kecamatan}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Instansi No.Laporan Polisi</label>
                            <input name="no_laporan" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Waktu Kejadian</label>
                            <input name="waktu" type="datetime-local" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Lokasi</label>
                            <input name="deskripsi_lokasi" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sifat dan Kasus</label>
                            <input name="sifat_kasus" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Biodata Korban</label>
                            <input name="bio_korban" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Sifat Cidera</label>
                            <input name="sifat_cidera" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary float-end mt-4" type="submit">Tambah</button>
            </form>
        </div>

    </div>


@endsection



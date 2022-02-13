@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card p-4">
            <form action="{{ route('update data2',['id'=>$id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <select class="form-select" name="tematik_id" required>
                                <option value="">Pilih Kecamatan</option>
                                @foreach ($tematik as $kecamatan)
                                <option {{$kecamatan->id == $data->tematik->id? 'selected':''}} value="{{$kecamatan->id}}">{{$kecamatan->kecamatan}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Instansi No.Laporan Polisi</label>
                            <input  value="{{$data->no_laporan}}" name="no_laporan" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Waktu Kejadian</label>
                            <input value="{{$data->waktu}}" name="waktu" type="datetime-local" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Lokasi</label>
                            <input value="{{$data->deskripsi_lokasi}}" name="deskripsi_lokasi" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sifat dan Kasus</label>
                            <input value="{{$data->sifat_kasus}}"name="sifat_kasus" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Biodata Korban</label>
                            <input value="{{$data->bio_korban}}" name="bio_korban" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Sifat Cidera</label>
                            <input value="{{$data->sifat_cidera}}" name="sifat_cidera" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary float-end mt-4" type="submit">Simpan</button>
            </form>
        </div>

    </div>


@endsection



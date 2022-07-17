<?php

namespace App\Http\Controllers;

use App\Models\HalamanData;
use App\Models\Tematik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeatmapController extends Controller
{
    public function index($show = 1,$radius = 0.001, $tahun = null)
    {
        $geofile = [];
        $coor = [];
        $arr = [];
        $info = [];
        $index = 0;
        $index2 = 0;
        $color = [];
        //pilihan tahun admin
        if ($tahun) {
            $data = HalamanData::where('tanggal', $tahun)->get();
        } else {
            $data = HalamanData::all();
        }
        $tematik = Tematik::all();
        foreach ($tematik as $item) {
            $geofile[$index] = '/storage/' . $item->geojson;
            $index++;
        }
        foreach ($data as $item) {
            $info[$index2] = [$item->alamat, $item->lat, $item->long, $item->tematik->kecamatan, $item->jumlah_kecelakaan,$item->tanggal];
            $index2++;
        }
        foreach ($tematik as $item) {
            $color[$item->kecamatan] = $item->warna;
        }
        $index = 0;
        foreach ($data as $item) {
            $coor['lat'] = $item->lat;
            $coor['lng'] = $item->long;
            //$coor['count'] = $item->jumlah_kecelakaan;
            $arr[$index] = $coor;
            $index += 1;
        }
        $tahunList = HalamanData::groupby('tanggal')->get();
        $kecamatan = $tematik->pluck('kecamatan');
        return view('heatmap', [
            'geofile' => $geofile,
            'color' => $color,
            'tahunList' => $tahunList,
            'tahun' => $tahun,
            'data' => $info,
            'radius' => $radius,
            'coor' => $arr,
            'show' => $show,
            'kecamatan' => $kecamatan
        ]);
    }
}

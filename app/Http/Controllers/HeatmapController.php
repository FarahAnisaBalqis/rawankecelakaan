<?php

namespace App\Http\Controllers;

use App\Models\HalamanData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeatmapController extends Controller
{
    public function index($show = 1,$radius = 0.001, $tahun = null)
    {
        $coor = [];
        $arr = [];
        $info = [];
        $index = 0;
        //pilihan tahun admin
        if ($tahun) {
            $data = HalamanData::where('tanggal', $tahun)->get();
        } else {
            $data = HalamanData::all();
        }

        foreach ($data as $item) {
            $info[$index] = [$item->alamat, $item->lat, $item->long, $item->tematik->kecamatan, $item->jumlah_kecelakaan,$item->tanggal];
            $index++;
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
        return view('heatmap', [
            'geofile' => [],
            'color' => [],
            'tahunList' => $tahunList,
            'tahun' => $tahun,
            'data' => $info,
            'radius' => $radius,
            'coor' => $arr,
            'show' => $show
        ]);
    }
}

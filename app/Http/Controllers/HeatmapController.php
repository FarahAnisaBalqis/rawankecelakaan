<?php

namespace App\Http\Controllers;

use App\Models\HalamanData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeatmapController extends Controller
{
    public function index( $radius = 0.01, $tahun = null)
    {
        $coor = [];
        $arr = [];
        $info = [];
        $index = 0;
        if ($tahun) {
            $data = HalamanData::where('tanggal', $tahun)->get();
        } else {
            $data = HalamanData::all();
        }

        foreach ($data as $item) {
            $info[$index] = [$item->alamat, $item->lat, $item->long];
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
            'coor' => $arr
        ]);
    }
}

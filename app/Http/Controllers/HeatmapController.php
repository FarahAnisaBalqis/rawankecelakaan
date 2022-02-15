<?php

namespace App\Http\Controllers;

use App\Models\HalamanData;
use Illuminate\Http\Request;

class HeatmapController extends Controller
{
    public function index()
    {
        $coor = [];
        $index = 0;
        $data = HalamanData::all();
       
        foreach ($data as $item) {
            $info[$index] = [$item->alamat, $item->lat, $item->long];
            $index++;
        }
        $index = 0;
        $arr = [];
        foreach ($data as $item) {
            $coor['lat'] = $item->lat;
            $coor['lng'] = $item->long;
            $coor['count'] = $item->jumlah_kecelakaan;
            $arr[$index] = $coor;
            $index++;
        }
        return view('heatmap', [
            'geofile' => [],
            'color' =>[],
            'data' => $info,
            'coor'=> $arr
        ]);
    }
}

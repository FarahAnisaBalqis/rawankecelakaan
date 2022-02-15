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
        foreach ($data as $item) {
            $coor[$index] = [$item->lat, $item->long];
            $index++;
        }
        return view('heatmap', [
            'geofile' => [],
            'color' =>[],
            'data' => $info,
            'coor'=> $coor
        ]);
    }
}

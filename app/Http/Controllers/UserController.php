<?php

namespace App\Http\Controllers;

use App\Models\HalamanData;
use App\Models\HalamanData2;
use App\Models\Tematik;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function map($tahun = null){
   
        $geofile = [];
        $color = [];
        $coor = [];
        $index = 0;
        $index2 = 0;
        $tematik = Tematik::all();
        //pilihan tahun map user
        if ($tahun) {
            $data = HalamanData::where('tanggal', $tahun)->get();
        } else {
            $data = HalamanData::all();
        }
        foreach ($tematik as $item) {
            $geofile[$index] = '/storage/' . $item->geojson;
            $index++;
        }
        foreach ($tematik as $item) {
            $color[$item->kecamatan] = $item->warna;
        }
        foreach ($data as $item) {
            $coor[$index2] = [$item->alamat, $item->lat, $item->long, $item->tematik->kecamatan, $item->jumlah_kecelakaan,$item->tanggal];
            $index2++;
        }
        $kecamatan = $tematik->pluck('kecamatan');

        $tahunList = HalamanData::groupby('tanggal')->get();
        return view('mapUser', [
            'geofile' => $geofile,
            'color' => $color,
            'data' => $coor,
            'tahunList' => $tahunList,
            'tahun' => $tahun,
            'kecamatan' => $kecamatan
        ]);
    }
    
    public function heatmap($show = 1, $radius = 0.01, $tahun = null)
    {
        $coor = [];
        $arr = [];
        $info = [];
        $index = 0;
        //pilihan tahun heatmap user
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
        return view('heatmap-user', [
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
    public function data()
    {
        $data = new HalamanData();
        $data2 = new HalamanData2();
        $kecamatan = $data->groupBy('tematik_id')
        ->selectRaw('sum(jumlah_kecelakaan) as sum, tematik_id')
        ->pluck('sum', 'tematik_id');
        if ($kecamatan->isNotEmpty()) {
            $kecamatan = $kecamatan->toArray();
            $kecamatan = array_search(max($kecamatan), $kecamatan);
            $kecamatan = Tematik::find($kecamatan);
            $kecamatan = $kecamatan->kecamatan;
        }
        $tanggal = $data2->select('*', DB::raw('COUNT(waktu) as count'))
        ->groupBy('waktu')
        ->orderBy('count')
        ->first();
        $tanggal = Carbon::parse($tanggal->waktu)->format('Y');
        $sifat = $data2->select('*', DB::raw('COUNT(sifat_cidera) as count'))
        ->groupBy('sifat_cidera')
        ->orderBy('count', 'DESC')
        ->first();
        $waktu = $data2->select('*', DB::raw('COUNT(waktu) as count'))
        ->groupBy('waktu')
        ->orderBy('count')
        ->first();
        $grafik = $data->with('tematik')->select('*', DB::raw('sum(jumlah_kecelakaan) as count'), 'tematik_id')
        ->groupBy('tematik_id')
        ->get();;
        $kec = [];
        $kasus = [];
        $id = 0;
        foreach ($grafik as $value) {
            $kec[$id] = $value->tematik->kecamatan;
            $kasus[$id] = $value->count;
            $id += 1;
        }
        $grafik2 = HalamanData::select(DB::raw('tanggal'), DB::raw('count(id) as sum'))
        ->groupBy('tanggal')
            ->get();
        $tahun = [];
        $jumlah = [];
        $id = 0;
        foreach ($grafik2 as $value) {
            $tahun[$id] = $value->tanggal;
            $jumlah[$id] = $value->sum;
            $id += 1;
        }


        return view('dataUser', [
            'kecamatan' => $kecamatan,
            'tanggal' => $tanggal,
            'sifat' => $sifat,
            'waktu' => Carbon::parse($waktu->waktu)->format('H'),
            'kec' => $kec,
            'kasus' => $kasus,
            'tahun' => $tahun,
            'jumlah' => $jumlah,
        ]);
    }
}

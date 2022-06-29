<?php

namespace App\Http\Controllers;

use App\Models\HalamanData as ModelsHalamanData;
use App\Models\Tematik;
use CreateHalamanDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HalamanData extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //setting view ke halaman data 1 dengan memanggil data tabel halaman_data
        return view("halaman-data",[
            'data' =>ModelsHalamanData::with('tematik')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // halaman untuk menambah inputan di halaman data
    public function create()
    {
        $tematik = Tematik::all();
        return view('tambah-data',['tematik'=>$tematik]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //simpan data pada tambah data
    public function store(Request $request)
    {
        $fileName="";
        if ($request->hasFile('gambar')) {
            $fileName = $request->gambar->store('public/images');
            $fileName = str_replace("public/", "", $fileName);
        }
        ModelsHalamanData::create([
            'alamat'=>$request->alamat,
            'tanggal' => $request->tanggal,
            'tematik_id'=>$request->kecamatan,
            'jumlah_kecelakaan'=>$request->jumlah,
            'gambar'=> $fileName,
            'long'=>$request->long,
            'lat'=>$request->lat

        ]);
        return redirect()->route('halaman data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //diplay detail
    public function show($id)
    {
        return view('detail', [
            'data'=>ModelsHalamanData::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tematik = Tematik::all();
        return view('edit',[
            'data' => ModelsHalamanData::with('tematik')->find($id),
            'id' =>$id,
            'tematik'=>$tematik,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //untuk simpan perubahan di halaman data
    public function update(Request $request, $id)
    {
        $fileName="";
        if ($request->hasFile('gambar')) {
            $file_path = storage_path('app/public/' . $request->gambar_lama);
        if (File::exists($file_path)) File::delete($file_path);
            $fileName = $request->gambar->store('public/images');
            $fileName = str_replace("public/", "", $fileName);
        }else{
            $fileName = $request->gambar_lama;
        }
        ModelsHalamanData::find($id)->update([
            'alamat'=>$request->alamat,
            'tanggal' => $request->tanggal,
            'tematik_id'=>$request->kecamatan,
            'jumlah_kecelakaan'=>$request->jumlah,
            'gambar'=> $fileName,
            'long'=>$request->long,
            'lat'=>$request->lat
        ]);
        return redirect()->route('halaman data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //untuk menghapus data
    public function destroy($id)
    {
        $data = ModelsHalamanData::find($id);
        $file_path = storage_path('app/public/' . $data->gambar);
        if (File::exists($file_path)) File::delete($file_path);
        $data->delete();
        return back();
    }
}

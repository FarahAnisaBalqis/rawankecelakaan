<?php

namespace App\Exports;

use App\Models\HalamanData;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Kecelakaan implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = HalamanData::all();
        return view('export', ['data' => $data]);
    }
}

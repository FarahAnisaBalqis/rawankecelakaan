<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Korban extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function data(){
        return $this->belongsTo(HalamanData::class,'halaman_data_id','id');
    }
}

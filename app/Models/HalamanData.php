<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HalamanData extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $dates = ['waktu'];
    function tematik(){
        return $this->belongsTo(Tematik::class,'tematik_id','id');
    }
    function korban()
    {
        return $this->hasMany(Korban::class);
    }
}

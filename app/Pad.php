<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pad extends Model
{
    //
    protected $fillable=['ministry_id','nir_id','kar_id','taha_id','pad_name'];

    public function taha(){
        $this->belongsTo('App\Taha');
    }
}

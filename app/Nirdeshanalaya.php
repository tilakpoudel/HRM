<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nirdeshanalaya extends Model
{

    protected $fillable=['ministry_id','nir_name','status'];

    public function ministry(){
        return $this->belongsTo('App\Ministry','ministry_id');
    }

    public function karyalaya(){
        $this->hasMany('App\Karyalaya','nirdeshanalaya_id');
    }
}

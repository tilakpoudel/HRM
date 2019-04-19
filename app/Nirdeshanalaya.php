<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nirdeshanalaya extends Model
{
    //

    protected $fillable=['ministry_id','nir_name','status'];

    public function ministry(){
        return $this->belongsTo('App\Ministry');
    }

    public function karyalaya(){
        $this->hasMany('App\Karyalaya');
    }
}

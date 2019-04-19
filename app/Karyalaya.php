<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyalaya extends Model
{
    //
    protected $fillable=['ministry_id','nirdeshanalaya_id','kar_name','status'];

    public function karyalaya(){
        $this->belongsTo('App\Nirdeshanalaya');
        
    }
    public function taha(){
        $this->hasMany('App\Taha');
        
    }
}

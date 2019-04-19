<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taha extends Model
{
    //
    protected $fillable=['ministry_id','nir_id','kar_id','taha_name','status'];

    public function karyalaya(){
        $this->belongsTo('App\Karyalaya');
        
    }
    public function pad(){
        $this->hasMany('App\Pad');
        
    }
           

   
}

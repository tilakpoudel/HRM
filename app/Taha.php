<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taha extends Model
{    
    protected $fillable=['ministry_id','nir_id','kar_id','taha_name','status'];

    public function karyalaya(){
        return $this->belongsTo('App\Karyalaya','kar_id');        
    }

    public function nirdeshanalaya(){
        return  $this->belongsTo('App\Nirdeshanalaya','nir_id');        
    }   
      
    public function ministry(){
        return $this->belongsTo('App\Ministry','ministry_id');
    }

    public function pad(){
        return $this->hasMany('App\Pad');        
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pad extends Model
{    
    protected $fillable=['ministry_id','nir_id','kar_id','taha_id','pad_name'];

    public function taha(){
        return $this->belongsTo('App\Taha','taha_id');
    }

    public function karyalaya(){
        return $this->belongsTo('App\Karyalaya','kar_id');        
    }

    public function nirdeshanalaya(){
        return  $this->belongsTo('App\Nirdeshanalaya','nir_id');        
    }   
      
    public function ministry(){
        return $this->belongsTo('App\Ministry','ministry_id');
    }
   
}

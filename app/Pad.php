<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pad extends Model
{    
    protected $fillable=['ministry_id','nirdeshanalaya_id','karyalaya_id','taha_id','pad_name'];

    public function taha(){
        return $this->belongsTo('App\Taha','taha_id');
    }

    public function karyalaya(){
        return $this->belongsTo('App\Karyalaya','karyalaya_id');        
    }

    public function nirdeshanalaya(){
        return  $this->belongsTo('App\Nirdeshanalaya','nirdeshanalaya_id');        
    }   
      
    public function ministry(){
        return $this->belongsTo('App\Ministry','ministry_id');
    }
   
}

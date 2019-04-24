<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyalaya extends Model
{    
    protected $fillable=['ministry_id','nirdeshanalaya_id','kar_name','status'];

    public function nirdeshanalaya(){
      return  $this->belongsTo('App\Nirdeshanalaya','nirdeshanalaya_id');        
    }   
    
    public function ministry(){
        return $this->belongsTo('App\Ministry','ministry_id');
    }

    public function taha(){
        $this->hasMany('App\Taha');        
    }
}

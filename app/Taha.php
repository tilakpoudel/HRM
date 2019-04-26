<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taha extends Model
{    
    protected $fillable=['ministry_id','nirdeshanalaya_id','karyalaya_id','taha_name','status'];

    public function karyalaya(){
        return $this->belongsTo('App\Karyalaya','karyalaya_id');        
    }

    public function nirdeshanalaya(){
        return  $this->belongsTo('App\Nirdeshanalaya','nirdeshanalaya_id');        
    }   
      
    public function ministry(){
        return $this->belongsTo('App\Ministry','ministry_id');
    }

    public function pad(){
        return $this->hasMany('App\Pad');        
    }
}

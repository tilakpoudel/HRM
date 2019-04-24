<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{    
    protected $fillable = ['first_name','middle_name','last_name','address','gender','dob','father_name','grandfather_name','spouse_name','ministry_id','nir_id','kar_id','taha_id','shreni_id','pad_id','hire_date','emp_type','emp_status'];

    public function pad(){
        $this->hasOne('App\Pad');
    }

    public function nirdeshanalaya(){
        return  $this->belongsTo('App\Nirdeshanalaya','nir_id');        
    }  

    public function ministry(){
        return $this->belongsTo('App\Ministry','ministry_id');
    }

    public function taha(){
        return $this->belongsTo('App\Taha','taha_id');
    }

    public function karyalaya(){
        return $this->belongsTo('App\Karyalaya','kar_id');        
    }

    public function shreni(){
        return $this->belongsTo('App\Shreni','shreni_id');        
    }

}

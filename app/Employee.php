<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = ['first_name','middle_name','last_name','address','gender','dob','father_name','grandfather_name','spouse_name','ministry_id','nir_id','kar_id','taha_id','shreni_id','pad_id','hire_date','emp_type','emp_status'];

    public function pad(){
        $this->hasOne('App\Pad');
    }

}

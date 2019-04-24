<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shreni extends Model
{    
    protected $fillable = ['shreni_name','status'];

    public function employee(){
        $this->hasMany('App\Employee');
    }
}

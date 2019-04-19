<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    protected $fillable =['ministry_name','status'];

    //one to many relation between Ministry and Nirdeshanalaya
    public function nirdeshanalaya(){
        return $this->hasMany('App\Nirdeshanalaya');
    }
}

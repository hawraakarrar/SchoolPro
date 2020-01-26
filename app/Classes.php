<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'class_id','part_id','image'
    ];


    public function students(){
        return $this->hasMany('App\Student');
    }


   
}

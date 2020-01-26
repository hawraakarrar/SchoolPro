<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    
    protected $fillable = [
        'name', 'lacture','image',
    ];
    public function books(){
        return $this->hasMany('App\Book');
    }
}

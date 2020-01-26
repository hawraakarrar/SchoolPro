<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Level;
class Part extends Model
{
    protected $fillable = [
        'name',
    ];
    public function levels(){
        return $this->belongsToMany('App\Level');
        
    }

}

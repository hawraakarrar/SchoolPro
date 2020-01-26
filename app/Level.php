<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Part;
class Level extends Model
{
    protected $fillable = [
        'name',
    ];
    public function parts(){
        return $this->belongsToMany('App\Part');
        
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name','link','subject','image','Teacher_id',
    ];

    public function staff(){
        return $this->belongsTo('App\Staff');
    }
}

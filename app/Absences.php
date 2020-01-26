<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absences extends Model
{
    protected $fillable = [
        'stu_id', 'permit', 'absence',
    ];

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}

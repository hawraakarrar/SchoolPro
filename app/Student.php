<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'name','image','birthdate','backSchool','address',
        'FrontNationalityPhoto','BackNationalityPhoto',
        'FrontHousingCard','BackHousingCard','NationalityCertificate',
        'RationCard','father_id','class_id','grade_img',
    ];
    public function users(){
        return $this->belongsTo('App\User');
    }

    public function class(){
        return $this->belongsTo('App\Classes');
    }
    public function absences()
    {
        return $this->hasOne('App\Absences');
    }

    
    
}

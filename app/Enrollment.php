<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    public function courses() {
        return $this->hasMany('Course');
    }

    public function plansOfStudy() {
        return $this->belongsToMany('PlanOfStudy');
    }

}

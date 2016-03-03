<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{

    protected $fillable = ['credits','semester','completed','pos_id','course_id'];

    public function courses() {
        return $this->hasMany('Course');
    }

    public function plansOfStudy() {
        return $this->belongsToMany('PlanOfStudy');
    }

}

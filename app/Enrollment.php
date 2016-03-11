<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Enrollment extends Model
{

    protected $fillable = ['credits','semester','completed','pos_id','course_id'];

    public function courses() {
        return $this->hasMany('Course');
    }

    public function plansOfStudy() {
        return $this->belongsToMany('PlanOfStudy');
    }

    // mutators
    public function getCreatedAtAttribute($date) {
        if (isset($date)) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m/d/Y');
        } else {
            return null;
        }
    }

}

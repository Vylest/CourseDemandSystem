<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function plansOfStudy() {
        return $this->belongsToMany('PlanofStudy');
    }

    public function requirements() {
        return $this->hasMany('requirement');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function PlansOfStudy() {
        return $this->hasMany('PlanOfStudy');
    }


}

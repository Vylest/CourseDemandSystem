<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['first_name','last_name','net_id','nu_id'];

    public function PlansOfStudy() {
        return $this->hasMany('PlanOfStudy');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['name','type','career'];

    public function plansOfStudy() {
        return $this->belongsToMany('PlanofStudy');
    }

    public function requirements() {
        return $this->hasMany('requirement');
    }
}

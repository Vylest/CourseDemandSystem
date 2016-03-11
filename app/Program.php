<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'type',
        'career',
        'credits_required'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function plansOfStudy() {
        return $this->hasMany('PlanofStudy');
    }

    public function degreeRequirements() {
        return $this->hasMany('DegreeRequirement');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'netid',
        'nuid'
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $appends = [
        'name'
    ];

    public function PlansOfStudy() {
        return $this->hasMany('PlanOfStudy');
    }

    public function getNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }
}

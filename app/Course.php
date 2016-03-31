<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'number',
        'title'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function degreeRequirements()
    {
        return $this->hasMany('DegreeRequirement');
    }

    public function enrollments()
    {
        return $this->belongsToMany('Enrollment');
    }
}

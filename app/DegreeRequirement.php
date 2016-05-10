<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DegreeRequirement extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type',
        'program_id',
        'course_id'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function program()
    {
        return $this->belongsTo('Program');
    }

    public function course()
    {
        return $this->belongsTo('Course');
    }
    
    public function enrollments()
    {
        return $this->hasMany('Enrollment');
    }
}

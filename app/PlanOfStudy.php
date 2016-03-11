<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanOfStudy extends Model
{
    use SoftDeletes;
    
    protected $table = 'plans_of_study';

    protected $fillable = [
        'student_id',
        'program_id',
        'graduated'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function student() {
        return $this->belongsTo('Student');
    }

    public function enrollments(){
        return $this->hasMany('Enrollment');
    }

    public function program() {
        return $this->belongsTo('Program');
    }
}

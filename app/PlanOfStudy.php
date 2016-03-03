<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanOfStudy extends Model
{
    protected $table = 'plans_of_study';

    use SoftDeletes;

    protected $fillable = [
        'student_id',
        'program_id'
    ];

    protected $dates = [
        'deleted_at'
    ];
}

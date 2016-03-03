<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrollment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'credits',
        'semester',
        'completed',
        'plan_of_study_id',
        'class_id'
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $casts = [
        'completed' => 'boolean'
    ];
}

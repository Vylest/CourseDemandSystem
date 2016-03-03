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
        'class_id'
    ];

    protected $dates = [
        'deleted_at'
    ];
}

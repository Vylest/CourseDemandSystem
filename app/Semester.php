<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{
    protected $fillable = [
        'semester',
        'completed',
    ];

    protected $casts = [
        //'completed' => 'boolean',
    ];

    public function enrollments()
    {
        return $this->belongsToMany('enrollment');
    }
}

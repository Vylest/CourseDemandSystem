<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{
    use SoftDeletes;

    protected $fillable = [

    ];

    protected $dates = [
        'deleted_at',
    ];

    protected $casts = [
      'completed' => 'boolean'
    ];

    public function enrollments() {
        return $this->belongsToMany('enrollment');
    }
}

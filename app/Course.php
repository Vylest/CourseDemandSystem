<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['number','title'];

    public function requirements() {
        return $this->belongsToMany('Requirements');
    }

    public function enrollments() {
        return $this->belongsToMany('Enrollment');
    }
}

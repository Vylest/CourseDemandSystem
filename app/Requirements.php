<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirements extends Model
{
    protected $fillable = ['type','program_id','course_id'];

    public function programs() {
        return $this->belongsTo('program');
    }

    public function courses() {
        return $this->hasOne('course');
    }
}

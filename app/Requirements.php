<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirements extends Model
{
    public function programs() {
        return $this->belongsTo('program');
    }

    public function courses() {
        return $this->hasOne('course');
    }
}

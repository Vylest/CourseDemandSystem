<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Class extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'number',
        'title'
    ];

    protected $dates = [
        'deleted_at'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'type',
        'career'
    ];

    protected $dates = [
        'deleted_at'
    ];
}

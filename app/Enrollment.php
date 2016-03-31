<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\SoftDeletes;

class Enrollment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'credits',
        'semester',
        'completed',
        'plan_of_study_id',
        'course_id'
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $casts = [
        'completed' => 'boolean'
    ];

    public function course()
    {
        return $this->belongsTo('Course');
    }

    public function planOfStudy()
    {
        return $this->belongsTo('PlanOfStudy');
    }

    public function semester()
    {
        return $this->hasOne('Semester');
    }

    // mutators
    public function getCreatedAtAttribute($date)
    {
        if (isset($date)) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m/d/Y');
        } else {
            return null;
        }
    }
}

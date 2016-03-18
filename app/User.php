<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name',  'email', 'password', 'nu_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $appends = ['is_admin','is_user'];

    // methods
    public function hasRole($role)
    {
        if (User::where('account_type', $role)->value('account_type') == Auth::user()->account_type) {
            return true;
        } else {
            return false;
        }
    }

    public function getIsAdminAttribute()
    {
        if ($this->attributes['account_type'] == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public function canEdit()
    {
        if ($this->account_type == 'admin' or $this->account_type == 'user') {
            return true;
        } else {
            return false;
        }
    }
}

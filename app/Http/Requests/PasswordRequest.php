<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PasswordRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'old_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed|different:old_password',
            'password_confirmation' => 'required'
        ];
    }
}

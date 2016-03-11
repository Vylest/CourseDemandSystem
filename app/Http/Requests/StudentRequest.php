<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StudentRequest extends Request
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'netid' => 'required|unique:students',
            'nuid' => 'required|numeric|between:10000000,99999999|unique:students',
            'status' => 'required',
            'foundation_outstanding' => 'boolean'
        ];
    }
}

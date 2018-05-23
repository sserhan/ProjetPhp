<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nom' => 'required|max:255',
            'email' => 'required|email|max:255',
            //'password' => 'required|confirmed|min:6'
        ];
    }

}
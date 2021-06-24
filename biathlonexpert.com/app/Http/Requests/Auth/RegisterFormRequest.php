<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class RegisterFormRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'first_name' => 'required|string|max:255|min:3',
            'last_name' => 'required|string|max:255|min:3',
            'address' => 'required|string|max:255|min:3',
            'city' => 'required|string|max:255|min:3',
            'country' => 'required|string|max:255|min:3',
            'phone' => 'required|string|max:255|min:3',
            'postal_code' => 'required|string|max:255|min:3',
            'plan_id' => 'required|integer|max:3|min:1',
        ];
    }
}

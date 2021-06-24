<?php

namespace App\Http\Requests\Profile;

use App\Http\Requests\Request;

class ProfileFormRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'string|min:6|max:100',
            'first_name' => 'string|max:255|min:3',
            'last_name' => 'string|max:255|min:3',
            'address' => 'string|max:255|min:3',
            'city' => 'string|max:255|min:3',
            'country' => 'string|max:100|min:3',
            'phone' => 'string|max:20|min:3',
            'postal_code' => 'string|max:10|min:3',
            'plan_id' => 'integer|min:1|max:3',
        ];
    }
}

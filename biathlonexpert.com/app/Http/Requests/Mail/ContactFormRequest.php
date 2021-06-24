<?php

namespace App\Http\Requests\Mail;

use App\Http\Requests\Request;

class ContactFormRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email|max:100',
            'firstName' => 'required|string|max:100|min:3',
            'lastName' => 'required|string|max:100|min:3',
            'phone' => 'required|string|max:20|min:3',
            'message' => 'required|string|min:3',
        ];
    }
}

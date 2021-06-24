<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Validation\Rule;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Get a validator for an incoming update request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string','email','max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'first_name' => 'required|string|max:255|min:3',
            'last_name' => 'required|string|max:255|min:3',
            'address' => 'required|string|max:255|min:3',
            'city' => 'required|string|max:255|min:3',
            'country' => 'required|string|max:255|min:3',
            'phone' => 'required|string|max:255|min:3',
            'postal_code' => 'required|string|max:255|min:3',
            'privacy' => 'required'
        ]);
    }

    /**
     * Update a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function update(Request $data)
    {
        $validator = $this->validator($data->all());
        if ($validator->fails()) {
            return redirect('profile')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find(Auth::user()->id)->update($data->all());

        return view('/profile');
    }

}

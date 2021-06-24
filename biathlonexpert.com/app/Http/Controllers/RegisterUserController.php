<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterFormRequest;
use App\Http\Requests\Auth\RegisterRemoteRequest;
use App\Http\Transformers\User\UserTransformer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

class RegisterUserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * @param \App\Http\Requests\Auth\RegisterFormRequest $request
     * @param \App\Models\User $user
     * @param \App\Http\Transformers\User\UserTransformer $transformer
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerUser(RegisterFormRequest $request, User $user, UserTransformer $transformer): JsonResponse
    {
        if (Auth()->guest()) {
            event(new Registered($user = $user->createUser($request->all())));

            $this->guard()->login($user);

            return response()->json([
                "status" => "ok",
                "user" => $transformer->transUsersData($user),
                "redirect" => route("dashboard"),
            ]);
        }
        return response()->json([
            "status" => "logged",
            "error" => "User was logged"
        ]);
    }

    /**
     * @param RegisterRemoteRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function registerUserRemote(RegisterRemoteRequest $request, User $user)
    {
        $data = $request->all();
        $data['subscribe_status'] = true;
        $data['subscribe_date'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['plan_id'] = 2;
        if (!$request->has('password') && $request->has('email')) {
            $data['password'] = 'secretpassword' . strtok($request->email, '@');
        }
        $user = $user->createUser($data);
        return response()->json([
            'status' => 'success',
            'data' => [
                'site_url' => $request->getHost() ,
                'login' => $user->email,
                'password' => $data['password'],
            ]
        ]);
    }

}
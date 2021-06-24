<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('*', function (\Illuminate\View\View $view) {
            $user = Auth::user()? collect(Auth::user()->only([
                'id',
                'email',
                'first_name',
                'last_name',
                'plan_id',
                'address',
                'city',
                'country',
                'phone',
                'postal_code',
                'subscribe_date',
                'subscribe_status',
            ]))
                :
                '{}';
            $view->with('user', ($user));
        });
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

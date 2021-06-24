<?php

namespace App\Http\Middleware;

use Closure;

class CheckSubscribe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->is_user_subscribe_active){
            return $next($request);
        }

        return redirect()->route('manage');
    }
}

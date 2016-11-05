<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckAccountActivation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $api = 0)
    {
        if (Auth::user()->activation && Auth::user()->activation->status == 0) {
            if ($api) {
                return response()->json(['error' => 'Account is not yet activated'], 401);
            } else {
                Auth::logout();
                session()->flash('message', 'Please activate your account.');
                session()->flash('error', 1);
                return redirect('/');
            }
        }

        return $next($request);
    }
}

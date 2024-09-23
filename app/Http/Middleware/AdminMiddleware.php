<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        if (Auth::check())
        {
            if (Auth::user()->user_type == '1')
            {
                return $next($request);
            }
            else
            {
                return redirect('/home')->with('message', 'You are not Allowed to perform that action');
            }
        }
        else
        {
            return redirect('login')->with('message', 'Please login first');
        }
    }
}

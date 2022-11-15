<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

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
        if(Auth::check()){
            
            //DB is currently configurated: ADMIN ROLE is 2, STAFF ROLE is 1, CLIENT is 0 (default value for any user)!
            if(Auth::user()->role == 2) {
                return $next($request);
            } else {
                return redirect('/')->with('message','You are not authorised to make this action. Please contact an adminstrator.');
            }

        } else {
            return redirect('/login')->with('message', 'Log in, please!');
        }

        //return $next($request);        
    }
}

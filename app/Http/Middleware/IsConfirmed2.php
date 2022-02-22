<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class IsConfirmed2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && auth()->user()->conf2 == 1){
            return $next($request);
        }
		else
		{
			if(Auth::check() && auth()->user()->levell == 1){
				return $next($request);
			}
			return redirect()->route('unconfirmed2')->with('error','Unconfirmed By Admin Account.');	
		}
    }
}

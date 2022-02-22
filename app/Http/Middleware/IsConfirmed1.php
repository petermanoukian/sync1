<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class IsConfirmed1
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
        if(Auth::check() && auth()->user()->conf1 == 1){
            return $next($request);
        }
		else
		{
			if(Auth::check() && auth()->user()->levell == 1){
				return $next($request);
			}
			return redirect()->route('unconfirmed')->with('error','Unconfirmed Account.');	
		}
    }
}

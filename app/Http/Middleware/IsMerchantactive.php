<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 





class IsMerchantactive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle($request, Closure $next)
    {
        if( Auth::check() && (auth()->user()->levell == 1 || auth()->user()->levell == 2) ){
			
			if( Auth::check() && (auth()->user()->levell == 1) )
			{
				return $next($request);
			}
			 
			if( Auth::check() && (auth()->user()->levell == 2) )
			{
				if( Auth::check() && (auth()->user()->statuss == 1) )
				{
					return $next($request);
				}
				else
				{
					return redirect('home')->with('error',"You don't have merchant or admin access.");
				}
			}
			 
        }
   
        return redirect('home')->with('error',"You don't have merchant or admin access.");
    }



}

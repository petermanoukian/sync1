<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class IsMerchant
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
        if( Auth::check() && (auth()->user()->levell == 1 || auth()->user()->levell == 2) ){
            return $next($request);
        }
   
        return redirect('home')->with('error',"You don't have merchant or admin access.");
    }
}

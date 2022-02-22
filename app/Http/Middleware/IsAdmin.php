<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;  
use Closure;
   
class IsAdmin
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
        if(Auth::check() && auth()->user()->levell == 1){
            return $next($request);
        }
   
        return redirect('home')->with('error',"You don't have admin access.");
    }
}
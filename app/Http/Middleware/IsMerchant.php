<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Session;


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
        if( Auth::check() && (auth()->user()->levell == 1 || auth()->user()->levell == 2) )
		{
			$pathname = $request->path(); // path
			$routename = $request->route()->getName();//name of the route
			if( Auth::check() && (auth()->user()->levell == 1 ) )
			{
				return $next($request);
			}
			else if( Auth::check() && (auth()->user()->levell == 2 ) )
			{
				$rolesess = $request->session()->get('fullrole');
				$rolesess =json_decode(json_encode($rolesess),true);
				//$dumper = var_dump($rolesess);
				$dumper = '';
				//$session['fullrole'];
				//echo "here " ;
				//var_dump($rolesess);

				$rolex= '';
				$i= 0;
				foreach($rolesess['role']['url'] as $rolex1)
				{
					
					$myname = '';
					$myname = $rolex1;
					$myname2 = "/".$myname;
					//echo "SEC <br> ";
					//var_dump($rolex1);
					$rolex .= "-$myname-";
					$i++;
					if($myname == "/".$pathname || $myname == $pathname
					|| $myname2 == "/".$pathname || $myname2 == $pathname)
					return $next($request);
				
					
				}
				return redirect("/appmerchant1?pathname=$pathname&paths=$rolex");
			}
        }
		//return $next($request);
		//http://127.0.0.1:8000/home?myname=appmerchant.addbranchcontactmyname-appmerchant.addbranchcontact&path=appmerchant&routename=viewMerchant.route
        return redirect("/appmerchant1")
		 //return redirect("/home?myname=1&path=$pathname&routename=$routename")
		->with('error',"You don't have merchant or admin access.");
    }
}

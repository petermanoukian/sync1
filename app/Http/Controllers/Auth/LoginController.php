<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Http\Request;


use App\Models\User;
use App\Models\Roleruser;
use App\Models\Rolercat;
use App\Models\Rolerperm;
use App\Models\Roler;
use Session;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;
   
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   
   
   	protected function loggedOut(Request $request) 
	{
    	return redirect('login');
	}
	
	public function login(Request $request)
    {   
        $input = $request->all();
		$ip = \Request::ip();
		$agent = $request->header('User-Agent');
		//$ip = $ip."K";
		$date = date('Y-m-d H:i:s');
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            
			$email = $request->email;
			$user = User::with(['userrolecats'])->where('email', $email)->first();
			
			//$token = $user->createToken('Shoppershop 411 acess token')->accessToken;
			
			if (auth()->user()->levell == '1')
			{
                return redirect()->route('viewAdmin.route');
            }
			else
			{	
				if($user->userrolecats)
				{
					$rolert = "";
					$rolerscoll['role'] = array();
					$rolefull = array();
					$rolerscoll['role']['name'] = array();
					$rolerscoll['role']['url'] = array();
					$rolerscoll['role']['sectionn'] = array();
					$rolerscoll['role']['typ'] = array();
					$rolerscoll['role']['method1'] = array();
					$rolerscoll['role']['method2'] = array();
					$rolerscoll['role']['method3'] = array();
					$rolerscoll['role']['classer'] = array();
					
					
					
					foreach($user->userrolecats as $uss)
					{
						$rolercatid = $uss->rolerid;
						$rolert .= " rolercatid $rolercatid <br>  ";
						//echo "Line 93  rolercatid $rolercatid <br>  " ;
						$rolecat = Rolercat::with(['rolecatperms'])->where('id', $rolercatid)->first();
						if($rolecat != '' && !empty($rolecat))
						{
							//echo " <br> Line 97  Not empty " ;
							if($rolecat->rolecatperms)
							{
								//echo " <br> line 100 Not empty " ;
								
								foreach($rolecat->rolecatperms as $prm)
								{
									$rolecatname = $rolecat['name'];
									$rolerid = $prm->rolerid;
									
									//echo " <br> Line 105 rolerid $rolerid " ;
									$roles = Roler::where('id', $rolerid)->get();
									foreach($roles as $role)
									{
										$rolename = $role['name'];
										$roleurlx = $role['urlx'];
										$sectionn = $role['sectionn'];
										$typ = $role['typ'];
										$method1 = $role['method1'];
										$method2 = $role['method2'];
										$method3 = $role['method3'];
										$classer = $role['classer'];
										
										array_push($rolefull , $role);
										
										array_push($rolerscoll['role']['name'] , $rolename);
										array_push($rolerscoll['role']['url'] , $roleurlx);
										array_push($rolerscoll['role']['sectionn'] , $sectionn);
										array_push($rolerscoll['role']['typ'] , $typ);
										array_push($rolerscoll['role']['method1'] , $method1);
										array_push($rolerscoll['role']['method2'] , $method2);
										array_push($rolerscoll['role']['method3'] , $method3);
										array_push($rolerscoll['role']['classer'] , $classer);
									}
								}
								
							
							
							
							}
						}
					}
					
					//$session['fullrole'] = $rolerscoll;
					//$request->session()->put('fullrole',"$rolerscoll");
					Session::put('fullrole',$rolerscoll);
					
					//
					
					/*
					var_dump($rolerscoll);
					echo "<br><hr><br>";
					
					var_dump($rolefull);
					//dd($rolert);
					exit;
					
					*/
					
				}
				return redirect()->route('viewMerchant.route');
            }
	
        }
		else
		{
            return redirect()->route('login')->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
	
	
	
	
	
	
   
   public function redirectTo()
	{
        
		// User role
		$role = Auth::user()->levell; 
		
		// Check user role
		switch ($role) {
			case '1':
					return '/appadmin';
				break;
			case '2':
					
					return '/appmerchant';
				break; 

			default:
					return '/login'; 
				break;
		}
	}
   
   
   


}

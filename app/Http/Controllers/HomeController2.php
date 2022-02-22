<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Country;
use App\Models\City;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use DataTables;

use DB;
use Redirect;

class HomeController2 extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('confirmed', 'confirm');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
	
	public function unconfirmed()
    {
        return view('unconfirmed');
    }
	
	public function unconfirmed2()
    {
        return view('unconfirmed2');
    }
	
	public function confirmed()
    {
        return view('confirmed');
    }

	public function confirm($email)
    {
        $user1 = DB::table('users')
	    ->where('email', '=', $email)
	    ->first();
		if($user1 != '')
		{
			$email2 = $user1->email;
			DB::table('users')
			->where('email', $email)
			->update(['conf' => 1]);
			return view('confirmed', ['email' => $email, 'email2' => $email2] );
		}
		else
		{
			echo " No such email ";
		}
		
		
    }
	
	
	public function adminHome()
    {
        $this->middleware(['auth','is_admin']);
		return view('appadmin.adminHome');
    }

	
	public function merchantHome()
    {
        $this->middleware(['auth','is_merchant']);
		return view('appmerchant.merchant');
    }
	
	public function custHome()
    {
        $this->middleware(['auth']);
		
		$userid = Auth::id();
		$profile = Profile::where('profiles.userid', '=', $userid)->first();
		return view('customer.home' , compact(['profile']));
    }
	
	
	public function custStoreBranch(Request $request)
    {
        $this->middleware(['auth', 'conf','conf2']);
		
		$userid = Auth::id();
		$profile = Profile::where('profiles.userid', '=', $userid)->first();
		$profilelongg = $profile->longg;
		$profilelat = $profile->lat;
		
		//dd(" $profilelongg FF $profilelat ");
		
		if ($request->ajax()) {
			
			
			$names = '';
		
			//dd(" country DD id $countryid ");
			
			/*
			$shops->select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                                + sin(radians(" .$latitude. ")) * sin(radians(latitude))) AS distance"));
			*/
			//where('branches.longg', 'like', $profilelongg)->where('branches.lat', 'like', $profilelat)
			$branches          =       DB::table("Branch");
	
	
	
			$data =Branch::
				where('branches.longg', 'like', $profilelongg)->where('branches.lat', 'like', $profilelat)->
				Join('stors', function($join)
				{
					 $join->on( 'stors.id', '=', 'branches.storid');
					 $join->on('stors.conf', '=', DB::raw('1'));;
				})->
				
				
				
				//where('stors.conf', '=', 1)->
				where('branches.conf', '=', 1)->
				where('branches.conf2', '=', 1)
				
				
				->with(['stor'])
				->with(['city'])
				->offset(0)->limit(5)->get('branches.*');
	
	
	
	
			//$data =City::with(['country'])->orderBy('cities.id', 'DESC');
			foreach($data as $branch)
			{
				$name = $branch->name;
				$names .= $name;
			}
		
			
			if( empty($names) )
			{
				
				$data =Branch::
				
				Join('stors', function($join)
				{
					 $join->on( 'stors.id', '=', 'branches.storid');
					 $join->on('stors.conf', '=', DB::raw('1'));;
				})->
				
				
				
				//where('stors.conf', '=', 1)->
				where('branches.conf', '=', 1)->
				where('branches.conf2', '=', 1)
				
				
				->with(['stor'])
				->with(['city'])
				->offset(0)->limit(5)->get('branches.*');
				
				//$data =Branch::limit(5);
			}			
			
			
			return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     					$id = $row['id'];
						$name = $row['name'];
						$storeid1 = $row['stor']['id'];
                        $btn = "<a href=\"/customer/sustbranchdetail/$id\" class=\"edit btn btn-primary btn-sm\">
							Details
						</a>";
    
                        return $btn;
                    })
					->addColumn('Store', function($row){

						$stor = $row['stor'];
						$storeid1 = $row['stor']['id'];
						$storname = $stor['name'];
						$btn2 = "<a href=\"/customer/suststoredetail/$storeid1\" class=\"edit btn btn-primary btn-sm\">
							&raquo; $storname
						</a>";
						
						
						return $btn2;

                    })
					
					->addColumn('City', function($row){

						$city = $row['city'];
						$cityname = $city['cityname'];
						return $city;

                    })
					->addColumn('Conf1', function($row){

						$conf = $row['conf2'];
						if($conf =='0') $conf1 = ' Disabled ';
						if($conf == '1') $conf1 = ' Enabled ';
						return $conf1;
                    })
					
                    ->rawColumns(array("action", "Store",  "City", "Conf1"))
                    ->make(true);
        }
		
		
		
		
		
		$names = '';
		$branches = 
		Branch::
			
		Join('stors', function($join)
		{
			 $join->on('stors.id', '=', 'branches.storid');
			 $join->on('stors.conf', '=', DB::raw('1'));
		})->
			
			
			
			where('branches.longg', 'like', $profilelongg)->where('branches.lat', 'like', $profilelat)->
			
			//where('stors.conf', '=', 1)->
			where('branches.conf', '=', 1)->
			where('branches.conf2', '=', 1)->
			with(['stor'])->
			with(['city'])->
			offset(0)->limit(5)->get('branches.*');
		
		foreach($branches as $branch)
		{
			$name = $branch->name;
			$names .= $name;
		}
		if($names == '')
		{
			$branches =Branch::
			
			Join('stors', function($join)
			{
				 $join->on( 'stors.id', '=', 'branches.storid');
				 $join->on('stors.conf', '=', DB::raw('1'));
			})->
			with(['stor'])->
			with(['city'])->
			where('branches.conf', '=', 1)->
			where('branches.conf2', '=', 1)->
			limit(5)->get('branches.*');
			foreach($branches as $branch)
			{
				$name = $branch->name;
				//echo $name;
			}
		}
		
		
		//var_dump($branches);
		return view('customer.customerstorebranch' , compact(['branches']));
		
		
    }

	public function custProfile()
    {
        $this->middleware(['auth']);
		
		$userid = Auth::id();
		$profile = Profile::where('profiles.userid', '=', $userid)->first();
		return view('customer.profile' , compact(['profile']));
    }
	

	
}

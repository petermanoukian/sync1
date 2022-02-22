<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stor;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
use App\Models\City;
use App\Models\Storecat;
use App\Models\Branch;
use App\Models\Prodtype;
use App\Models\Prod;

use App\Models\Citystor;
use App\Models\Prodtypestor;

use App\Models\Profilem;

use DB;
use Redirect;



use DataTables;

class HomeController extends Controller
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
	
	public function indexadmin()
    {
       $this->middleware(['auth','is_admin']);
	   return view('appadmin.home');
    }
	
	public function indexmerchant()
    {
       $this->middleware(['auth','is_merchant' ,'conf1','conf2']);
	   return view('appmerchant.home');
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
			->update(['conf1' => 1]);
			return view('confirmed', ['email' => $email, 'email2' => $email2] );
		}
		else
		{
			echo " No such email ";
		}	
    }
	
	
	public function adminHome(Request $request)
    {
        $this->middleware(['auth','is_admin']);
		
		$stor1 =Stor::where('stors.conf', '=', 0)->count();
		$stor2 =Stor::where('stors.conf', '=', 1)->count();
		
		$merchant1 =User::where('users.is_admin', '=', 2)->count();
		$branch1 =Branch::count();
		$prod1 =Prod::count();
		
		
		if ($request->ajax()) {

				//dd(" country DD id $countryid ");user()
			
					$data =Stor::
					where('stors.conf', '=', 0)->
					with(['country'])->with(['cat'])
					->with(['user'])
					->with(['storprodtypes'])
					->with(['storcities'])
					->withCount('branches')
					->get();

		
				//$data =City::with(['country'])->orderBy('cities.id', 'DESC');

            	return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     					$id = $row['id'];
						$name = $row['name'];
						
						$cities = $row['storcities'];
						$count = $row['branches_count'];
						$countryid1 = $row['country']['id'];

                        $btn = "<a href=\"/appadmin/editstor/$id\" class=\"edit btn btn-primary btn-sm\">Edit  </a>
									<a href = \"/appadmin/stor/delete/$id\" class=\"btn btn-danger\"
									onclick=\"return confirm('Are you sure?');\">
									Delete </a> 
									<br>
									<div style = 'margin-top:10px;'>
										<a href=\"/appadmin/viewbranch/$id\" class=\"edit btn btn-primary btn-sm\">Branches  ($count)</a>
									</div>";
    
                        return $btn;
                    })
					
					->addColumn('Name', function($row){

						$name = $row['name'];
						$id = $row['id'];
						$storid = $row['id'];
						$btn2 = "<a href=\"/appadmin/stordetail/$storid\" > &rsaquo; $name </a>
						|
						
						";
						return $btn2;
					})

					->addColumn('Countries', function($row){

						$storcities= $row['storcities'];
						$country = $row['country']['name'];
						$cities = " Country : $country <hr> Cities:";
						foreach ($storcities  as $city)
						{
							$cityname = $city->cities['name'];
							$cities .= " $cityname | ";
						}
						$cities = rtrim($cities," | ");
						return $cities;

                    })
					->addColumn('Merchant', function($row)
					{
						$usernam = $row['user']['name'];
						return $usernam;
                    })
					->addColumn('Conf1', function($row){

						$conf = $row['conf'];
						if($conf =='0') $conf1 = ' <span style = "color:orange;">Waiting Approval </span>';
						if($conf == '1') $conf1 = ' <span style = "color:green;">Approved </span>';
						if($conf == '2') $conf1 = ' <span style = "color:red;">Not Approved </span>';
						return $conf1;
                    })
					
                    ->rawColumns(array("action", 'Name', "Countries", 'Merchant' , 'Conf1'))
                    ->make(true);
        }
		
		
    
	
	


		//$cats=Country::orderBy('id', 'DESC')->paginate(2);
		return view('appadmin.adminHome' , compact('stor1' , 'stor2' , 'merchant1' , 'branch1' , 'prod1'));
	}
	
	
	
	public function adminHomeProd(Request $request)
    {
		$this->middleware(['auth','is_admin']);
		
		if ($request->ajax()) {
		
	
			$data =Prod::with(['prodsub'])
				->with(['user'])
				->with(['prodbrand'])
				->with(['prodstor'])
				->with('prodtaggs')
				->withCount('prodvars')
				->where('prods.highlight', '=', 1)
				->limit(10);
				
			
			//$data =City::with(['country'])->orderBy('cities.id', 'DESC');

			return Datatables::of($data)
				->addIndexColumn()
	
				->addColumn('Cat', function($row){
						$cat = $row['prodcat']['name'];
						$subcat = $row['prodsub']['name'];
						if(!empty($row['prodsubsub']['name']))
						{
							$subsubcat = $row['prodsubsub']['name'];
						}
						else
							$subsubcat = ' ';
						$cater = " $cat - $subcat - $subsubcat ";
						return $cater;
				})
				->addColumn('Store', function($row)
				{
					$storname = $row['prodstor']['name'];
					return $storname;
				})

				->addColumn('Highlight', function($row)
				{
					$name = $row['name'];
					$highlight = $row['highlight'];
					
					if($highlight == 1)
						$name = "<b>$name</b>";
					else
						$name = $name;
					return $name;
				})
				->addColumn('action', function($row){
					$id = $row['id'];
					$name = $row['name'];

					$btn = "<a href = \"/appadmin/prod/delete/$id\" class=\"btn btn-danger\"
								onclick=\"return confirm('Are you sure?');\">
								Delete </a> 									
								<a href=\"/appadmin/proddetail/$id\" class=\"edit btn btn-primary btn-sm\">Details  </a>";
					return $btn;
				})

				
				->rawColumns(array("action", "Highlight" , "Cat", 'Store'))
				->make(true);
        }
		
		
		
	}
	
	
	
	
	
	public function adminHomeProd2(Request $request)
    {
		$this->middleware(['auth','is_admin']);
		
		if ($request->ajax()) {
		
	
			$data =Prod::with(['prodsub'])
				->with(['user'])
				->with(['prodbrand'])
				->with(['prodstor'])
				->with('prodtaggs')
				->withCount('prodvars')
				->get();
				
			
			//$data =City::with(['country'])->orderBy('cities.id', 'DESC');

			return Datatables::of($data)
				->addIndexColumn()
	
				->addColumn('Cat', function($row){
						$cat = $row['prodcat']['name'];
						$subcat = $row['prodsub']['name'];
						$subsubcat = $row['prodsubsub']['name'];
						$cater = " $cat - $subcat - $subsubcat ";
						return $cater;
				})
				->addColumn('Store', function($row)
				{
					$storname = $row['prodstor']['name'];
					return $storname;
				})	
				->rawColumns(array("action", "Cat", 'Store'))
				->make(true);
        }
		return view('appadmin.viewprod');
		
	}
	
	
	public function custHomeProd(Request $request)
    {
		$this->middleware(['auth','conf','conf2']);
		
		if ($request->ajax()) {
		
	
			$data =Prod::with(['prodsub'])
				->with(['user'])
				->with(['prodbrand'])
				->with(['prodstor'])
				->with('prodtaggs')
				->withCount('prodvars')
				->where('prods.highlight', '=', 1)
				->limit(10);
				
			
			//$data =City::with(['country'])->orderBy('cities.id', 'DESC');

			return Datatables::of($data)
				->addIndexColumn()
	
				->addColumn('Cat', function($row){
						$cat = $row['prodcat']['name'];
						$subcat = $row['prodsub']['name'];
						$subsubcat = $row['prodsubsub']['name'];
						$cater = " $cat - $subcat - $subsubcat ";
						return $cater;
				})
				->addColumn('Store', function($row)
				{
					$storname = $row['prodstor']['name'];
					return $storname;
				})

				->addColumn('Highlight', function($row)
				{
					$name = $row['name'];
					$highlight = $row['highlight'];
					
					if($highlight == 1)
						$name = "<b>$name</b>";
					else
						$name = $name;
					return $name;
				})
				->addColumn('action', function($row){
					$id = $row['id'];
					$name = $row['name'];

					$btn = "<a href=\"/customer/proddetail/$id\" class=\"edit btn btn-primary btn-sm\">Details  </a>";
					return $btn;
				})

				
				->rawColumns(array("action", "Highlight" , "Cat", 'Store'))
				->make(true);
        }
		
		
		
	}



	
	public function merchantHome($storid='')
    {
        $this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		if($storid != "" && $storid != NULL)
		{
			$storid = $storid;
		}
		
		else
		{
			try
			{
				$roww =Stor::where('stors.userid', '=', $userid)
				->orderBy('stors.id', 'DESC')
				->first();
				if($roww)
				$storid = $roww->id;
				else
				$storid = '';
			}
			
			catch (\Exception $e) 
			{
				$message =  $e->getMessage();
				echo "message $message ";
				
			}
		}
		//return view('appmerchant.merchant');
		if($storid && $storid != '')
		{
			//return redirect()->route('MerchantStorDetail.route' , [$storid]);
			//return view('appmerchant.merchant' , compact( 'storid'));
			return redirect()->route('MerchantHome1.route' , [$storid]);
		}
		else{
			
			//$this->create();
			
			$countries = Country::orderBy('id', 'DESC')->get();
			$cats = Storecat::orderBy('id', 'DESC')->get();
			$cities = City::orderBy('id', 'DESC')->get();
			$prodtypes = Prodtype::orderBy('id', 'DESC')->get();
			//dd(37);
			//echo " 38 ";
			//return view('appmerchant/addstor', compact('countries','cats' , 'cities' , 'prodtypes'));
			return Redirect::route('AddMerchantStore.route' , ['countries','cats' , 'cities' , 'prodtypes']);
			
			
		}
    }

	
	public function merchantHome1($storid='')
    {
        $this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		if($storid != "" && $storid != NULL)
		{
			$storid = $storid;
		}
		
		else
		{
			try
			{
				$roww =Stor::where('stors.userid', '=', $userid)
				->orderBy('stors.id', 'DESC')
				->first();
				if($roww)
				$storid = $roww->id;
				else
				$storid = '';
			}
			
			catch (\Exception $e) 
			{
				$message =  $e->getMessage();
				echo "message $message ";
				
			}
		}
		//return view('appmerchant.merchant');
		if($storid && $storid != '')
		{
			//return redirect()->route('MerchantStorDetail.route' , [$storid]);
			return view('appmerchant.merchant1' , compact( 'storid'));
			
		}
		else{
			
			//$this->create();
			
			$countries = Country::orderBy('id', 'DESC')->get();
			$cats = Storecat::orderBy('id', 'DESC')->get();
			$cities = City::orderBy('id', 'DESC')->get();
			$prodtypes = Prodtype::orderBy('id', 'DESC')->get();
			//dd(37);
			//echo " 38 ";
			//return view('appmerchant/addstor', compact('countries','cats' , 'cities' , 'prodtypes'));
			return Redirect::route('AddMerchantStore.route' , ['countries','cats' , 'cities' , 'prodtypes']);
			
			
		}
    }
	

	
	public function custHome()
    {
        $this->middleware(['auth']);
		return view('customer.home');
    }
	
	
	
}

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Illuminate\Support\Facades\Auth;

use DataTables;
use App\Models\User;
use App\Models\Roleruser;
use App\Models\Roler;
use App\Models\Rolercat;


class RoleruserController extends Controller
{
    public function _construct()
    {
        $this->middleware(['auth','is_admin']);
    }
	
	public function create( $useridx ='')
    {  
		$this->middleware(['auth','is_admin']);
		
		$users = User::where('levell', '=', '2')->orderBy('name', 'ASC')->get();
		$rolidx  = '';
		if($useridx !='')
		{
			$case =  " <br> CASE 1 B <br> ";
			$rolidx = array();
			$rolerusersalready = Roleruser::
				where('userid', '=', $useridx)
				->get();
				$i = 0;
			foreach($rolerusersalready as $rl)
			{
				$i++;
				$rlidf = $rl['rolerid'];
				//$i = $rlidf;
				array_push($rolidx , $rlidf);
				//$rlidf =json_encode($rlidf);
				//$rolidx .= json_encode("$rlidf,");
				
			}
		
			//$rolidx = rtrim($rolidx, ',');
			$roles = 
			Rolercat::
			//join('rolers', 'rolers.id', '=', 'rolerusers.rolerid')->				
			leftJoin('rolerusers', function($join )  use($rolidx , $useridx)
			{
				$join->on('rolerusers.rolerid', '=', 'rolercats.id');	
				//$join->on('rolerusers.userid', '=', DB::raw($useridx));
			})
			->leftJoin('users', 'users.id', '=', 'rolerusers.userid')
			//->whereNotIn('rolerusers.rolerid',  $rolidx)

			//->where('rolerusers.userid', '=', $useridx)

			->orderBy('rolercats.name', 'ASC')
			->get('rolercats.*' );

		}		
		else
		{
			$case =  " <br> CASE 3 C <br> ";
			$roles = Rolercat::orderBy('rolercats.name', 'ASC')->get();
		}
		
		return view('appadmin/addroleuser' , compact('users' , 'roles' , 'useridx' , 'case'));
    }
	
	public function store(Request $request)
    {
		$this->middleware(['auth','is_admin']);
		try
		{
			
			$rolerid = $request->rolerid;
			$useridx = $request->useridx;
			if(isset($rolerid) && $rolerid != "")
			{
				foreach($rolerid as $rid)
				{
					$xid = '';
					$check1 = 
					Roleruser::where('userid', '=', $useridx)
					->where('rolerid', '=', $rid)->first();
					if($check1)
					{
						$xid = $check1->id;	
					}
					if($xid == '')
					{
						$in = Roleruser::create(['userid' => $useridx ,  
						'rolerid' =>  $rid,  
						 ]);
						$in->save();
					}
				}
				//return Redirect::route('viewRoleuser.route');
				return Redirect("/appadmin/viewroleuser/$useridx");
			}

		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
			echo " message $message " ;
		}
		

    }

	public function indexadmin(Request $request , $useridx ='')
	{	
		$this->middleware(['auth','is_admin']);
		$sess = session_id();
		$token =  $request->session()->token();
		if ($request->ajax()) 
		{
			//->orderBy('name', 'ASC')->get()
			
			
			
			if(isset($request->useridx))
			{
				$useridx = $request->useridx;

				$data = Roleruser::
				leftjoin('rolercats', 'rolercats.id', '=', 'rolerusers.rolerid')->
				leftjoin('users', 'users.id', '=', 'rolerusers.userid')

				->orderBy('rolercats.name', 'ASC')
				->where('rolerusers.userid', '=', $useridx)
				->get('rolerusers.*' , 'rolercats.*' , 'users.*' , 'rolerusers.id as idx' );
				
				
				
			}
			else
			{
				$data = Roleruser::
				leftjoin('rolercats', 'rolers.id', '=', 'rolerusers.rolerid')->
				leftjoin('users', 'users.id', '=', 'rolerusers.userid')
				->orderBy('rolercats.name', 'ASC')
				->get('rolerusers.*' , 'rolercats.*' , 'users.*' , 'rolerusers.id as idx' );
			}


            return Datatables::of($data)
                    ->addIndexColumn()
					->addColumn('ID', function($row)
					{
						$id = $row['id'];
						return $id;
					})

                    ->addColumn('action', function($row) use ($token){
     					$id = $row['id'];
						$articlecatid = $row['id'];
						$name = $row['name'];
						$email = $row['email'];
                        $btn = "<div style = 'display:inline;float:left;margin-left:5px;'>
									<form method = 'post' action = \"/appadmin/roleuser/delete/$id\">
									<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
									<input type=\"hidden\" name=\"_token\" value=\"$token\">
									<input type = 'submit' value = 'Delete' onclick = 'return confirm(\"are you sure you want to remove this item\");'/
									class=\"btn btn-danger\">
									</form>
								</div>
								";
                            return $btn;
                    })
					
					->addColumn('Roler', function($row)
					{
						$rolename = $row['rolercat']['name'];

						$cat = " <b>  $rolename </b>";
						return $cat;
					})
					->addColumn('User', function($row)
					{
						$usern = $row['user']['name'];
						$userl = $row['user']['lname'];
						$userem = $row['user']['email'];
						$full = " $usern $userl $userem ";
						return  $full;
					})

					
					->rawColumns(array("action",   'Roler' , 'User'))
                    ->make(true);
        }

		return view('appadmin.viewroleuser' , compact( 'useridx'));
	}
	

	



	public function destroy($id )
	{
		$this->middleware(['auth','is_admin']);
		$user =Roleruser::where('id', '=', $id)->first();

		$user->delete();
		//User::destroy($id);
		return Redirect::route('viewRoleuser.route');
	}
}

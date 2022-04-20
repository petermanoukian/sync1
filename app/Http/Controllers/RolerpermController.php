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
use App\Models\Rolerperm;



class RolerpermController extends Controller
{
    public function _construct()
    {
        $this->middleware(['auth','is_admin']);
    }
	
	public function create( $rolercatid ='')
    {  
		$this->middleware(['auth','is_admin']);	
		$rolecats = Rolercat::orderBy('name', 'ASC')->get();
		$rolidx  = '';
		$roles = Roler::orderBy('sectionn', 'ASC')->orderBy('urlx', 'ASC')->orderBy('name', 'ASC')->get();
		return view('appadmin/addroleperm' , compact('rolecats' , 'roles' , 'rolercatid' ));
    }
	
	public function store(Request $request)
    {
		$this->middleware(['auth','is_admin']);
		try
		{
			
			$rolerid = $request->rolerid;
			$rolercatid = $request->rolercatid;
			if(isset($rolerid) && $rolerid != "")
			{
				foreach($rolerid as $rid)
				{
					$xid = '';
					$check1 = 
					Rolerperm::where('rolercatid', '=', $rolercatid)
					->where('rolerid', '=', $rid)->first();
					if($check1)
					{
						$xid = $check1->id;
						
					}
					if($xid == '')
					{
						$in = Rolerperm::create(['rolercatid' => $rolercatid ,  
						'rolerid' =>  $rid,  
						 ]);
						$in->save();
					}
				}
				//return Redirect::route('viewRoleuser.route');
				return Redirect("/appadmin/viewroleperm/$rolercatid");
			}

		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
			echo " message $message " ;
		}
		

    }

	public function indexadmin(Request $request , $rolercatid ='')
	{	
		$this->middleware(['auth','is_admin']);
		$sess = session_id();
		$token =  $request->session()->token();
		if ($request->ajax()) 
		{
			//->orderBy('name', 'ASC')->get()
			if(isset($request->rolercatid))
			{
				$rolercatid = $request->rolercatid;

				$data = Rolerperm::
				leftjoin('rolers', 'rolers.id', '=', 'rolerperms.rolerid')->
				leftjoin('rolercats', 'rolercats.id', '=', 'rolerperms.rolercatid')
				->orderBy('rolers.sectionn', 'ASC')
				->orderBy('rolers.urlx', 'ASC')
				->orderBy('rolers.name', 'ASC')
				->where('rolerperms.rolercatid', '=', $rolercatid)
				->get('rolerperms.*' , 'rolers.*' , 'rolercats.*' , 'rolerperms.id as idx' );	
			}
			else
			{
				$data = Rolerperm::
				leftjoin('rolers', 'rolers.id', '=', 'rolerperms.rolerid')->
				leftjoin('rolercats', 'rolercats.id', '=', 'rolerperms.rolercatid')
				->orderBy('rolers.sectionn', 'ASC')
				->orderBy('rolers.urlx', 'ASC')
				->orderBy('rolers.name', 'ASC')
				->get('rolerperms.*' , 'rolers.*' , 'rolercats.*' , 'rolerperms.id as idx' );	
			}


            return Datatables::of($data)
                    ->addIndexColumn()
					
					->addColumn('Delete1', function($row) use ($token){
     					$id = $row['id'];
						$name = $row['name'];
                        $btn1 = "
						<div class=\"form-check form-check-sm form-check-custom form-check-solid\">
						<input type = 'checkbox' name = 'idx[]' value = \"$id\"
						class='form-check-input'></form>";
                        return $btn1;
                    })
					
					->addColumn('ID', function($row)
					{
						$id = $row['id'];
						return $id;
					})

                    ->addColumn('action', function($row) use ($token){
     					$id = $row['idx'];
						$id = $row['id'];
						
						
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
						$rolename = $row['roler']['name'];
						$rolepath = $row['roler']['urlx'];
						$rolesectionn = $row['roler']['sectionn'];
						$cat = " <b>$rolename </b>($rolesectionn) - $rolepath ";
						return $cat;
					})
					->addColumn('rolercat', function($row)
					{
						$user = $row['rolercat']['name'];
						return $user;
					})

					
					->rawColumns(array('Delete1' ,"action",   'Roler' , 'rolercat'))
                    ->make(true);
        }

		return view('appadmin.viewroleperm' , compact( 'rolercatid'));
	}
	

	



	public function destroy($id )
	{
		$this->middleware(['auth','is_admin']);
		$user =Rolerperm::where('id', '=', $id)->first();

		$user->delete();
		//User::destroy($id);
		return Redirect::route('viewRolecat.route');
	}
	
	
	public function destroyall(Request $request )
	{
		$this->middleware(['auth','is_admin']);
		$userid = Auth::id();
		if($request->idx && is_array($request->idx))
		{
			foreach($request->idx as $id)
			{
				$row =Rolerperm::where('id', '=', $id)->first();
				$row->delete();
			}
		}
		return Redirect::route('viewRolecat.route');
	}
	
	
	
	
}

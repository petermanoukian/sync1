<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Roler;
use App\Models\Rolercat;
use DataTables;

use App\Models\User;






class RolercatController extends Controller
{
    public function _construct()
    {
        $this->middleware(['auth','is_admin']);
    }
	
	public function create()
    {  
		$this->middleware(['auth','is_admin']);
		return view('appadmin/addrolecat');
    }
	
	public function store(Request $request)
    {
		$this->middleware(['auth','is_admin']);
		try
		{
			$user = Rolercat::create(['name' => $request->name]);
			$user->save();
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
		}
		return Redirect::route('viewRolecat.route');

    }

	public function indexadmin(Request $request )
	{	
		$this->middleware(['auth','is_admin']);
		$sess = session_id();
		$token =  $request->session()->token();
		if ($request->ajax()) 
		{
			$data =Rolercat::get();	
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
                    ->addColumn('action', function($row) use ($token){
     					$id = $row['id'];
						$articlecatid = $row['id'];
						$name = $row['name'];
						$email = $row['email'];
                        $btn = "<div style = 'display:inline;float:left;margin-left:5px;'>
									<form method = 'post' action = \"/appadmin/rolecat/delete/$id\">
									<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
									<input type=\"hidden\" name=\"_token\" value=\"$token\">
									<input type = 'submit' value = 'Delete' onclick = 'return confirm(\"are you sure you want to remove this item\");'/
									class=\"btn btn-danger\">
									</form>
								</div>

								<div style = 'display:inline;float:left;margin-left:5px;'>
								
									<a href=\"/appadmin/editrolecat/$id\" class=\"edit btn btn-primary btn-sm\">
									Edit </a>
								
									<a href=\"/appadmin/addroleperm/$id\" class=\"edit btn btn-primary btn-sm\">
									Add Permission </a>
									<a href=\"/appadmin/viewroleperm/$id\" class=\"edit btn btn-primary btn-sm\">
									Permission </a>
								</div>								
								";
                            return $btn;
                    })
			
					
					->rawColumns(array("action",  'Delete1'))
                    ->make(true);
        }

		return view('appadmin.viewrolecat');
	}
	
	public function edit($id)
	{
		$this->middleware(['auth','is_admin']);
		$row =Rolercat::find($id);
		return view('appadmin.editrolecat', compact('row'));
	}
	
	
	
	
	public function update(Request $request, $id)
	{
		$this->middleware(['auth','is_admin']);
		$row =Rolercat::findOrFail($id);
		try
		{
			$row->update(['name' => $request->name 
			]);
		}
		catch (\Exception $e) 
		{
			$message =  $e->getMessage();
		}

		return Redirect::route('viewRolecat.route');
	}



	public function destroy($id )
	{
		$this->middleware(['auth','is_admin']);
		$user =Rolercat::where('id', '=', $id)->first();

		$user->delete();
		//User::destroy($id);
		return Redirect::route('viewRolecat.route');
	}
	
	
	
}

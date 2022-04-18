<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use DataTables;






class AdminController extends Controller
{
    public function _construct()
    {
        $this->middleware(['auth','is_admin']);
    }
	
	public function create()
    {  
		$this->middleware(['auth','is_admin']);
		return view('appadmin/adduser');
    }
	
	public function store(Request $request)
    {
		try
		{
			$this->middleware(['auth','is_admin']);
			$user = User::create(['name' => $request->name , 'lname' => $request->lname ,  'email' => $request->email ,
			 'password' => Hash::make($request->password), 'is_admin' =>  $request->levell, 'statuss' =>  $request->statuss,
			 'conf1' => 1,
			 'conf2' => 1,
			 ]);
			$user->save();
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
		}
		return Redirect::route('viewUser.route');

    }

	public function indexadmin(Request $request , $levell = '')
	{	
		$this->middleware(['auth','is_admin']);
		$sess = session_id();
		$token =  $request->session()->token();
		if ($request->ajax()) 
		{
			$data =User::get();	
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
						$levell = $row['levell'];
						if($levell == 2)
						{
							$btn = "<div style = 'display:inline;float:left;margin-left:5px;'>
									<form method = 'post' action = \"/appadmin/user/delete/$id\">
									<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
									<input type=\"hidden\" name=\"_token\" value=\"$token\">
									<input type = 'submit' value = 'Delete' onclick = 'return confirm(\"are you sure you want to remove this item\");'/
									class=\"btn btn-danger\">
									</form>
								</div>
								<div style = 'display:inline;float:left;margin-left:5px;'>
									<a href=\"/appadmin/edituser/$id\" class=\"edit btn btn-primary btn-sm\">Edit</a>
								</div>
								<br><br>
								<div style = 'display:inline;float:left;margin-left:5px;'>
									<a href=\"/appadmin/viewroleuser/$id\" 
									class=\"edit btn btn-primary btn-sm\">Roles</a>
								</div>
								 
								<div style = 'display:inline;float:left;margin-left:5px;'>
									<a href=\"/appadmin/addroleuser/$id\" 
									class=\"edit btn btn-primary btn-sm\">Add Roles</a>
								</div>
								 
								 ";
						}
						else if($levell == 1)
						{
							$btn = "<div style = 'display:inline;float:left;margin-left:5px;'>
									<form method = 'post' action = \"/appadmin/user/delete/$id\">
									<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
									<input type=\"hidden\" name=\"_token\" value=\"$token\">
									<input type = 'submit' value = 'Delete' onclick = 'return confirm(\"are you sure you want to remove this item\");'/
									class=\"btn btn-danger\">
									</form>
								</div>

								 
								 <div style = 'display:inline;float:left;margin-left:5px;'>
									<a href=\"/appadmin/edituser/$id\" class=\"edit btn btn-primary btn-sm\">Edit</a>
								 </div>
 
								";
							
						}
                        return $btn;
                    })->addColumn('level', function($row){

						$is_admin = $row['levell'];
						if($is_admin == 1)
						$level = "Super Admin";
						elseif($is_admin == 2)
						$level = "Merchant";

						return $level;
                    })->addColumn('statuss', function($row){

						$statuss= $row['statuss'];
						if($statuss == 1)
						$level3 = "Active";
						elseif($statuss == 2)
						$level3 = "New";
						elseif($statuss == 0)
						$level3 = "Inactive";

						return $level3;
                    })
					
                    ->addColumn('Full', function($row){

						$name = $row['name'];
						$lname = $row['lname'];
						$email = $row['email'];
						$full = " $name $lname <br> $email ";
						return $full;
                    })
					->rawColumns(array("action", "level" , 'Delete1', 'statuss' , 'Full'))
                    ->make(true);
        }

		return view('appadmin.viewuser', compact('levell', ));
	}
	
	public function edit($id)
	{
		$this->middleware(['auth','is_admin']);
		$row =User::find($id);
		return view('appadmin.edituser', compact('row'));
	}
	
	
	
	
	public function update(Request $request, $id)
	{
		$this->middleware(['auth','is_admin']);

		$conf2 = $request->conf2;
		$level = $request->is_admin;
		$user =User::findOrFail($id);
		
		if($request->password && $request->password != "")
		{
			//echo " HERE 137 ";
			try
			{
				 $name = $request->name;
				 $email = $request->email;
				 $user->update(['name' => $request->name , 'lname' => $request->lname , 'email' => $request->email ,'statuss' =>  $request->statuss,
				 'password' => Hash::make($request->password), 'levell' =>  $request->is_admin,
				 'conf' => 1,
				 'conf2' => 1]);
				 
				 if($conf2 == 1 && $level == 2)
				 {
					
				 }
				 
			}
			catch (\Exception $e) 
			{
				$message =  $e->getMessage();
			}
		}
		else
		{
			//echo " HERE 153 ";
			try
			{
				$user->update(['name' => $request->name ,  'lname' => $request->lname ,  'email' => $request->email , 'statuss' =>  $request->statuss,
				'levell' =>  $request->is_admin, 'conf1' => 1, 'conf2' => 1]);
				 
				$name = $request->name;
				$email = $request->email;
			 
			}
			catch (\Exception $e) 
			{
				$message =  $e->getMessage();
			}
		}
		


		return Redirect::route('viewUser.route');
	}



	public function destroy($id )
	{
		$this->middleware(['auth','is_admin']);
		$user =User::where('users.id', '=', $id)->first();

		$user->delete();
		//User::destroy($id);
		return Redirect::route('viewUser.route');
	}
	
	
	
	
}

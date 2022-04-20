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



class RolerController extends Controller
{
    
	public function _construct()
    {
        $this->middleware(['auth','is_admin']);
    }
	
	public function create(Request $request)
    {  
		$this->middleware(['auth','is_admin']);
	
		return view('appadmin/addrole' );
    }
	
	public function store(Request $request)
    {
		$this->middleware(['auth','is_admin']);
		try
		{
			$catid = $request->catid;
			$user = Roler::create([ 
			'name' => $request->name , 'menuname' => $request->menuname , 'urlx' =>  $request->urlx,  
			'des' =>  $request->des, 'sectionn' =>  $request->sectionn,'typ' =>  $request->typ,
			'menux' =>  $request->menux, 
			'method1' =>  $request->method1, 
			'method2' =>  $request->method2,
			'method3' =>  $request->method3,
			'classer' =>  $request->classer,
			 ]);
			$user->save();
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
		}
		return Redirect::route('viewRole.route');
		
		//return Redirect("/appadmin/viewrole/$catid");

    }

	public function indexadmin(Request $request )
	{	
		$this->middleware(['auth','is_admin']);
		$sess = session_id();
		$token =  $request->session()->token();
		if ($request->ajax()) 
		{
			$data =Roler::get();	
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
									<form method = 'post' action = \"/appadmin/role/delete/$id\">
									<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
									<input type=\"hidden\" name=\"_token\" value=\"$token\">
									<input type = 'submit' value = 'Delete' onclick = 'return confirm(\"are you sure you want to remove this item\");'/
									class=\"btn btn-danger\">
									</form>
								</div>
								<div style = 'display:inline;float:left;margin-left:5px;'>
									<a href=\"/appadmin/editrole/$id\" class=\"edit btn btn-primary btn-sm\">
									Edit</a>
								</div>";
                            return $btn;
                    })
					
                    ->addColumn('URL', function($row){
						$urlx= $row['urlx'];
						return $urlx;
                    })
					 ->addColumn('sectionn', function($row){
						$sectionn= $row['sectionn'];
						return $sectionn;
                    })
					->addColumn('typ', function($row){
						$typ= $row['typ'];
						$menux= $row['menux'];
						$type1 = "$menux - $typ";
						return $type1;
                    })
					->addColumn('methods', function($row){
						$method1 = $row['method1'];
						$method2 = $row['method2'];
						$method3 = $row['method3'];
						$classer = $row['classer'];
						$urlx= $row['urlx'];
						$methods = " $urlx <br> $classer $method1 $method2 $method3 ";
						return $methods;
                    })
					
					->rawColumns(array("action",  'Delete1', 'URL' , 'sectionn' , 'typ' , 'methods'))
                    ->make(true);
        }

		return view('appadmin.viewrole');
	}
	
	public function edit($id)
	{
		$this->middleware(['auth','is_admin']);
		$row =Roler::find($id);
		
		return view('appadmin.editrole', compact('row'));
	}
	
	
	
	
	public function update(Request $request, $id)
	{
		$this->middleware(['auth','is_admin']);
		$row =Roler::findOrFail($id);
		try
		{
			
			$row->update(['name' => $request->name ,'menuname' => $request->menuname,'urlx' =>  $request->urlx,  
			'des' =>  $request->des, 
			'sectionn' =>  $request->sectionn,
			'typ' =>  $request->typ,
			'menux' =>  $request->menux,
			'classer' =>  $request->classer, 
			'method1' =>  $request->method1, 
			'method2' =>  $request->method2,
			'method3' =>  $request->method3,
			]);
		}
		catch (\Exception $e) 
		{
			$message =  $e->getMessage();
		}
		//return Redirect("/appadmin/viewrole/");
		return Redirect("/appadmin/viewrole");
		//return Redirect::route('viewRole.route');
	}



	public function destroy($id )
	{
		$this->middleware(['auth','is_admin']);
		$user =Roler::where('id', '=', $id)->first();

		$user->delete();
		//User::destroy($id);
		return Redirect::route('viewRole.route');
	}
	
	
	
	
}

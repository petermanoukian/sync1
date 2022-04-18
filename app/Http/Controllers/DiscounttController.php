<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Discountt;
use DataTables;

class DiscounttController extends Controller
{
     public function __construct()
    {

    }   
	
	public function create()
    {
        $this->middleware(['auth','is_admin']);
		return view('appadmin.adddiscount');
    }
	
	public function indexadmin(Request $request)
	{
		$this->middleware(['auth','is_admin']);	
		$sess = session_id();
		$token =  $request->session()->token();	
		$userid = Auth::id();
		//echo " userid ::: $userid  ";
		
		if ($request->ajax()) {
            $data = Discountt::orderBy('id', 'DESC')->get();
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
                        $btn = "
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<form method = 'post' action = \"/appadmin/discount/delete/$id/\">
							".csrf_field(). method_field('DELETE') ."
							<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
							<input type=\"hidden\" name=\"_token\" value=\"$token\">
							<input type = 'submit' value = 'Delete' onclick = 'return confirm(\"are you sure you want to remove this item\");'/
							class=\"btn btn-danger\">
							</form>
						</div>
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<a href=\"/appadmin/editdiscount/$id\" class=\"edit btn btn-primary btn-sm\">Edit </a>
							<a href=\"/appadmin/adddiscountcat/$id\" class=\"edit btn btn-primary btn-sm\">Add To Categories </a>
							<a href=\"/appadmin/viewdiscountcat/$id\" class=\"edit btn btn-primary btn-sm\">Discount Categories </a>
						</div>";
                        return $btn;
                    })	
					->addColumn('Name', function($row)
					{
						$name = $row['name'];
						return $name;
                    })	
					->addColumn('Perc', function($row)
					{
						$perc = $row['perc'];
						return $perc;
                    })
					->rawColumns(array("action", "Name" , 'Perc',  'Delete1' ))
                    ->make(true);
        }
		
		return view('appadmin.viewdiscount');
	}
	
	public function edit($id)
	{
		$this->middleware(['auth','is_admin']);
		$userid = Auth::id();

		$row = Discountt::where('id', '=', $id)->first();
		return view('appadmin.editdiscount', compact('row' ));
	}

	
	public function store(Request $request)
	{
		$this->middleware(['auth','is_admin']);
		$this->validate($request, [
		'name' => 'required' 
		]);
		try
		{
			$row =Discountt::create([ 'name' => $request->name , 'perc' => $request->perc 
			]);
			$row->save();
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
			//echo "message $message ";
		}
		return Redirect::route('viewDiscount.route')->with("message","Thank you");	
	}
	
	public function update(Request $request, $id)
	{

		$this->middleware(['auth','is_admin']);
		$this->validate($request, [
		'name' => 'required' 
		]);

		
		$row = Discountt::where('id', '=', $id)->first();
		try
		{
			$row->update([
			'name' => $request->name , 'perc' => $request->perc 
			]);	
			$LastInsertId = $id;
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
		}
		return Redirect::route('viewDiscount.route');
	}	


	public function destroy($id )
	{
		$this->middleware(['auth','is_admin']);
		$userid = Auth::id();
		$row = Discountt::where('id', '=', $id)->first();
		$row->delete();
		return Redirect::route('viewDiscount.route');
	}
	
	
	public function destroyall(Request $request )
	{
		$this->middleware(['auth','is_admin']);
		$userid = Auth::id();
		if($request->idx && is_array($request->idx))
		{
			foreach($request->idx as $id)
			{
				$row = Discountt::where('id', '=', $id)->first();
				$row->delete();
			}
		}
		return Redirect::route('viewDiscount.route');
	}
}

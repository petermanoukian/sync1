<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Discountt;
use App\Models\Discounttcat;
use App\Models\Cat;

use DataTables;



class DiscounttcatController extends Controller
{
    public function create(Request $request , $discid='')
    {
        
		$this->middleware(['auth','is_admin']);
		$cats = Cat::orderBy('name', 'ASC')->get();	
		$discs = Discountt::orderBy('id', 'DESC')->get();	
		return view('appadmin.adddiscountcat' , compact('cats' ,  'discs' , 'discid'));
    }
	
	public function indexadmin(Request $request , $discid='')
	{
		$this->middleware(['auth','is_admin']);	
		$sess = session_id();
		$token =  $request->session()->token();	
		$userid = Auth::id();
		
		if($discid != "" && $discid != NULL && $discid != 0)
		{
			$data = Discounttcat::with(['cat'])->with(['disc'])
			->where('disccats.discid', '=', $discid)
			->orderBy('disccats.id', 'DESC')->get();
		}
		else
		{
			$data = Discounttcat::with(['cat'])->with(['disc'])
			->orderBy('disccats.id', 'DESC')->get();
		}
		if ($request->ajax()) {
		
		
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
				
				->addColumn('Cat', function($row){
						$catname = $row['cat']['name'];	
						return $catname;
				})
				->addColumn('Disc', function($row){
						$discname = $row['disc']['name'];	
						return $discname;
				})

				->addColumn('Name', function($row)
				{
					$name = $row['name'];
					return $name;
                })
	
				->addColumn('action', function($row) use ($token){
					$id = $row['id'];
					$catid = $row['catid'];
					$btn = "
					<div style = 'display:inline;float:left;margin-left:5px;'>
						<form method = 'post' action = \"/appadmin/discountcat/delete/$id/\">
						".csrf_field(). method_field('DELETE') ."
						<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
						<input type=\"hidden\" name=\"_token\" value=\"$token\">
						<input type = 'submit' value = 'Delete' onclick = 'return confirm(\"are you sure you want to remove this item\");'/
						class=\"btn btn-danger\">
						</form>
					</div>

					";
					return $btn;
				})	
				->addColumn('Name', function($row)
				{
					$name = $row['name'];
			
					return $name;
				})
				->rawColumns(array("action", "Name" , 'Cat', 'Delete1' , 'Disc'))
				->make(true);
      	}
		return view('appadmin.viewdiscountcat' , compact('discid' ));	
		
	}
	
	public function edit($id)
	{
		$this->middleware(['auth','is_admin']);
		$userid = Auth::id();

		$row = Discounttcat::where('id', '=', $id)->first();
		return view('appadmin.editdiscountcat', compact('row' ));
	}

	
	public function store(Request $request)
	{
		$this->middleware(['auth','is_admin']);
		$this->validate($request, [
		'name' => 'required' 
		]);
		try
		{	
			if($request->catid && is_array($request->catid))
			{
				foreach($request->catid as $catidx)
				{
					$row =Discounttcat::create([ 'name' => $request->name , 'discid' => $request->discid , 'catid' => $catidx 
					]);
					$row->save();
				}
			}
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
			//echo "message $message ";
		}
		return Redirect::route('viewDiscountcat.route')->with("message","Thank you");	
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
			'name' => $request->name , 'discid' => $request->discid , 'catid' => $request->catid 
			]);	
			$LastInsertId = $id;
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
		}
		return Redirect::route('viewDiscountcat.route');
	}	


	public function destroy($id )
	{
		$this->middleware(['auth','is_admin']);
		$userid = Auth::id();
		$row = Discounttcat::where('id', '=', $id)->first();
		$row->delete();
		return Redirect::route('viewDiscountcat.route');
	}
	
	
	public function destroyall(Request $request )
	{
		$this->middleware(['auth','is_admin']);
		$userid = Auth::id();
		if($request->idx && is_array($request->idx))
		{
			foreach($request->idx as $id)
			{
				$row = Discounttcat::where('id', '=', $id)->first();
				$row->delete();
			}
		}
		return Redirect::route('viewDiscountcat.route');
	}
}

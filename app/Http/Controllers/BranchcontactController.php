<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\User;
use App\Models\Subcompany;
use App\Models\Typebranch;
use App\Models\Branch;
use App\Models\Branchcontact;
use Image;
use DataTables;

class BranchcontactController extends Controller
{
    public function __construct()
    {

    }   

	
	public function create($branchid='' , $typebranchid='' , $compid='', $subcompid='' )
    {
        $this->middleware(['auth','is_merchant' ,'conf1','conf2']);
		$userid = Auth::id();
	
		$branch = Branch::where('userid', '=', $userid)->where('id', '=', $branchid)->first();
		
		$typs = Typebranch::orderBy('name', 'ASC')->get();
		return view('appmerchant/addbranchcontact' , compact('branch', 'branchid'));
    }
	
	public function indexadmin(Request $request , $branchid='' )
	{
		$this->middleware(['auth','is_merchant' ,'conf1','conf2']);	
		$sess = session_id();
		$token =  $request->session()->token();	
		$userid = Auth::id();
		//echo " userid ::: $userid  ";
		
		if ($request->ajax()) {	
			if($branchid != "" && $branchid != NULL)
			{
				//branch
				$data = Branchcontact::with(['company'])->with(['subcompany'])->with(['typebranch'])
				->with(['branch'])
				->where('branchcontacts.userid', '=', $userid)
				->where('branchcontacts.branchid', '=', $branchid)
				->orderBy('branchcontacts.id', 'DESC')->get();
	
			}
			else
			{
				$data = Branchcontact::with(['company'])->with(['subcompany'])->
				with(['typebranch'])->with(['branch'])
				->where('branchcontacts.userid', '=', $userid)
				->orderBy('branchcontacts.id', 'DESC')->get();
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
					
					->addColumn('Company', function($row){
							$compname = $row['company']['name'];
							$subcompname = $row['subcompany']['name'];	
							$all = "  $compname  ";
							return $all;
					})
					->addColumn('SubCompany', function($row){
							$subcompname = $row['subcompany']['name'];	
							return $subcompname;
					})
					->addColumn('Branch', function($row){
							$branchname = $row['branch']['name'];	
							return $branchname;
					})
					
					->addColumn('Typer', function($row) use ($token){
     					$id = $row['id'];
						$typebranch = $row['typebranch']['name'];
                        return $typebranch;
                    })
                    ->addColumn('action', function($row) use ($token){
     					$id = $row['id'];
						$compid = $row['compid'];
						$subcompid = $row['subcompid'];
						$typebranchid = $row['typebranchid'];
						$branchidx = $row['branchid'];
						//$count = $row['subcats_count'];
                        $btn = "
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<form method = 'post' action = \"/appmerchant/branchcontact/delete/$id/\">
							".csrf_field(). method_field('DELETE') ."
							<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
							<input type=\"hidden\" name=\"_token\" value=\"$token\">
							<input type = 'submit' value = 'Delete' 
							onclick='return confirm(\"are you sure you want to remove this item\");'/
							class=\"btn btn-danger\">
							</form>
						</div>
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<a href=\"/appmerchant/editbranchcontact/$id\" class=\"edit btn btn-primary btn-sm\">Edit </a>	
						</div>
						";
                        return $btn;
                    })	
					->addColumn('Name', function($row)
					{
						$name = $row['name'];
						return $name;
                    })
					->rawColumns(array("action", "Name" , 'Company', 'SubCompany', 'Delete1' , 'Typer' , 'Branch'))
                    ->make(true);
        }	
		return view('appmerchant.viewbranchcontact'  , compact( 'branchid'));
	}
	
	public function edit($id)
	{
		//dd(1);
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$row = Branchcontact::where('userid', '=', $userid)->where('id', '=', $id)->first();
		//dd(1);
		return view('appmerchant.editbranchcontact', compact('row'));
	}

	public function store(Request $request)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$this->validate($request, [
		'name' => 'required' 
		]);
		$userid = Auth::id();
		$subcompid = $request->subcompid;
		$compid = $request->compid;
		$typebranchid = $request->typebranchid;
		$branchid = $request->branchid;
		try
		{
			//userid	typebranchid	compid	subcompid	name	mobile	phone	des	
			$row =Branchcontact::create([ 'name' => $request->name , 'mobile' => $request->mobile ,
			'phone' => $request->phone , 'address' => $request->dess , 'userid' => "$userid" ,
			'compid' => "$compid" ,'subcompid' => "$subcompid" , 'typebranchid' => $typebranchid 
			, 'branchid' => $branchid
			]);
			$row->save();
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
			//echo "message $message ";
		}
		return redirect("appmerchant/viewbranchcontact/$branchid");
		
	}
	
	public function update(Request $request, $id)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$this->validate($request, [
		'name' => 'required' 
		]);

		$userid = Auth::id();

		$branchid = $request->branchid;

		$row = Branchcontact::where('userid', '=', $userid)->where('id', '=', $id)->first();
		try
		{
			$row->update([
			'name' => $request->name , 'mobile' => $request->mobile ,'phone' => $request->phone , 'address' => $request->dess 
			]);	
			$LastInsertId = $id;
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
		}
		return redirect("appmerchant/viewbranchcontact/$branchid");
	}	



	public function destroy($id )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$row =Branchcontact::where('branchcontacts.userid', '=', $userid)->where('branchcontacts.id', '=', $id)->first();
		$branchid = $row->branchid;
		$row->delete();
		return redirect("appmerchant/viewbranchcontact/$branchid");
	}
	
	
	public function destroyall(Request $request )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		if($request->idx && is_array($request->idx))
		{
			foreach($request->idx as $id)
			{
				$row =Branchcontact::where('branchcontacts.userid', '=', $userid)->where('branchcontacts.id', '=', $id)->first();
				$branchid = $row->branchid;
				$row->delete();
			}
		}
		return redirect("appmerchant/viewbranchcontact/$branchid");
	}
	
}






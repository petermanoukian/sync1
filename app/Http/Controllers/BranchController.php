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
use Image;
use DataTables;

class BranchController extends Controller
{
    public function __construct()
    {

    }   

	
	public function create($compid='' , $subcompid='')
    {
        $this->middleware(['auth','is_merchant' ,'conf1','conf2']);
		$userid = Auth::id();
		$comps = Company::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subcomps = Subcompany::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$typs = Typebranch::orderBy('name', 'ASC')->get();
		return view('appmerchant/addbranch' , compact('comps' , 'subcomps', 'typs' , 'compid' , 'subcompid'));
    }
	
	public function indexadmin(Request $request , $compid='' , $subcompid='')
	{
		$this->middleware(['auth','is_merchant' ,'conf1','conf2']);	
		$sess = session_id();
		$token =  $request->session()->token();	
		$userid = Auth::id();
		//echo " userid ::: $userid  ";
		
		if ($request->ajax()) {	
			if($compid != "" && $compid != NULL)
			{
				if($subcompid != "" && $subcompid != NULL)
				{
					$data = Branch::with(['company'])->with(['subcompany'])->with(['typebranch'])
					->where('branches.userid', '=', $userid)
					->where('branches.compid', '=', $compid)
					->where('branches.subcompid', '=', $subcompid)
					->orderBy('branches.id', 'DESC')->get();
				}
				else
				{
					$data = Branch::with(['company'])->with(['subcompany'])->with(['typebranch'])
					->where('branches.userid', '=', $userid)
					->where('branches.compid', '=', $compid)
					->orderBy('branches.id', 'DESC')->get();	
				}	
			}
			else
			{
				$data = Branch::with(['company'])->with(['subcompany'])->
				with(['typebranch'])->
				where('branches.userid', '=', $userid)
				->orderBy('branches.id', 'DESC')->get();
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
					
					->addColumn('Typer', function($row) use ($token){
     					$id = $row['id'];
						$typebranch = $row['typebranch']['name'];
                        return $typebranch;
                    })
                    ->addColumn('action', function($row) use ($token){
     					$id = $row['id'];
						$branchidx = $row['id'];
						$compid = $row['compid'];
						$subcompid = $row['subcompid'];
						$typebranchid = $row['typebranchid'];
						
						//$count = $row['subcats_count'];
                        $btn = "
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<form method = 'post' action = \"/appmerchant/branch/delete/$id/\">
							".csrf_field(). method_field('DELETE') ."
							<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
							<input type=\"hidden\" name=\"_token\" value=\"$token\">
							<input type = 'submit' value = 'Delete' 
							onclick='return confirm(\"are you sure you want to remove this item\");'/
							class=\"btn btn-danger\">
							</form>
						</div>
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<a href=\"/appmerchant/editbranch/$branchidx/$typebranchid/$compid/$subcompid/\" 
							class=\"edit btn btn-primary btn-sm\">Edit </a>	
						</div>
						
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<a href=\"/appmerchant/addbranchcontact/$branchidx/$typebranchid/$compid/$subcompid\" 
							class=\"edit btn btn-primary btn-sm\">Add Branch Contact </a>	
						</div>	";
                        return $btn;
                    })	
					->addColumn('Name', function($row)
					{
						$name = $row['name'];
						return $name;
                    })
					->rawColumns(array("action", "Name" , 'Company', 'SubCompany', 'Delete1' , 'Typer'))
                    ->make(true);
        }	
		return view('appmerchant.viewbranch'  , compact( 'compid' , 'subcompid'));
	}
	
	public function edit($id , $compid , $subcompid)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$comps = Company::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subcomps = Subcompany::orderBy('name', 'ASC')->get();
		$typs = Typebranch::orderBy('name', 'ASC')->get();
		$row = Branch::where('userid', '=', $userid)->where('id', '=', $id)->first();
		return view('appmerchant.editbranch', compact('row' , 'comps'  , 'subcomps' , 'typs'));
	}

	public function store(Request $request)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$this->validate($request, [
		'name' => 'required' , 'compid' => 'required'  , 'subcompid' => 'required'
		]);
		$userid = Auth::id();
		$subcompid = $request->subcompid;
		$compid = $request->compid;
		$typebranchid = $request->typebranchid;
		try
		{
		//userid	typebranchid	compid	subcompid	name	mobile	phone	des	
			$row =Branch::create([ 'name' => $request->name , 'mobile' => $request->mobile ,
			'phone' => $request->phone , 'des' => $request->des , 'dess' => $request->dess ,
			'userid' => "$userid" ,
			'compid' => "$compid" ,'subcompid' => "$subcompid" , 'typebranchid' => $typebranchid 
			]);
			$row->save();
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
			//echo "message $message ";
		}
		return Redirect::route('viewBranch.route')->with("message","Thank you for taking this sub sub company");	
	}
	
	public function update(Request $request, $id)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$this->validate($request, [
		'name' => 'required' , 'compid' => 'required'  , 'subcompid' => 'required'
		]);

		$userid = Auth::id();

		$subcompid = $request->subcompid;
		$compid = $request->compid;
		$typebranchid = $request->typebranchid;
		
		$row = Branch::where('userid', '=', $userid)->where('id', '=', $id)->first();
		try
		{
			$row->update([
			 'name' => $request->name , 'mobile' => $request->mobile ,
			'phone' => $request->phone , 'des' => $request->des , 'dess' => $request->dess ,
			'userid' => "$userid" ,'compid' => "$compid" ,'subcompid' => "$subcompid" , 'typebranchid' => $typebranchid 
			]);
			
			$LastInsertId = $id;
		
	
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
		}
		return Redirect::route('viewBranch.route');
	}	



	public function destroy($id )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$row =Branch::where('branches.userid', '=', $userid)->where('branches.id', '=', $id)->first();
		$row->delete();
		return Redirect::route('viewBranch.route');
	}
	
	
	public function destroyall(Request $request )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		if($request->idx && is_array($request->idx))
		{
			foreach($request->idx as $id)
			{
				$row =Branch::where('branches.userid', '=', $userid)->where('branches.id', '=', $id)->first();
				$row->delete();
			}
		}
		return Redirect::route('viewBranch.route');
	}
	
}

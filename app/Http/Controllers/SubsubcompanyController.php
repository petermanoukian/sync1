<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\User;
use App\Models\Typesubcompany;
use App\Models\Subcompany;
use App\Models\Subsubcompany;
use Image;
use DataTables;


class SubsubcompanyController extends Controller
{
    public function __construct()
    {

    }   
	
	public function getSubsubcompAjax(Request $request)
    {
		
		if($request->subsubcompid != "")
		{
			$subsubcompid = $request->subsubcompid;
		}
		else
		{
			$subsubcompid = '';
		}
		if($request->subcompid != "")
		{
			$userid = Auth::id();
			$html = '<select class="form-control" name = "subsubcompid" id="subsubcompid">
			<option value = "">Choose Subsubcompany</option>';
			$subcats = Subsubcompany::where('subcompid', $request->subcompid)->where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
			$count = count($subcats);
			if($subcats && !empty($subcats) && $count > 0)
			{
				foreach ($subcats as $subcat) 
				{
					if($subsubcompid != "" && $subsubcompid == $subcat->id)
					$html .= '<option value="'.$subcat->id.'" selected>'.$subcat->name.'</option>';
					else
					$html .= '<option value="'.$subcat->id.'">'.$subcat->name.'</option>';
				}
			
				$html .= "</select>";
			}
			else 
			$html = '<select class="form-control" name = "subsubcompid" id="subsubcompid" ></select> ';
		}
		else
		$html = 'Choose A Sub sub Company';
    	return response()->json(['html' => $html]);
    }

	
	
	
	
	public function create($compid='' , $subcompid='')
    {
        $this->middleware(['auth','is_merchant' ,'conf1','conf2']);
		$userid = Auth::id();
		$comps = Company::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subcomps = Subcompany::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		return view('appmerchant/addsubsubcompany' , compact('comps' , 'subcomps', 'compid' , 'subcompid'));
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
					$data = Subsubcompany::with(['company'])->with(['subcompany'])
					->where('subsubcompanies.userid', '=', $userid)
					->where('subsubcompanies.compid', '=', $compid)
					->where('subsubcompanies.subcompid', '=', $subcompid)
					->orderBy('subsubcompanies.id', 'DESC')->get();
				}
				else
				{
					$data = Subsubcompany::with(['company'])->with(['subcompany'])
					->where('subsubcompanies.userid', '=', $userid)
					->where('subsubcompanies.compid', '=', $compid)
					->orderBy('subsubcompanies.id', 'DESC')->get();	
				}	
			}
			else
			{
				$data = Subsubcompany::with(['company'])->with(['subcompany'])->where('subsubcompanies.userid', '=', $userid)
				->orderBy('subsubcompanies.id', 'DESC')->get();
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
					
					->addColumn('Image', function($row) use ($token){
     					$id = $row['id'];
						$img = $row['logo'];
						if($img !='')
						{
							$path = asset('/images/subsubcompany/thumb/'.$img);	
							$btn2 = " <img src = \"$path\" style = 'max-width:180px;' />";
						}
						else						
							$btn2 = "no picture";
                        return $btn2;
                    })
                    ->addColumn('action', function($row) use ($token){
     					$id = $row['id'];
						$compid = $row['compid'];
						$subcompid = $row['subcompid'];
						
						//$count = $row['subcats_count'];
                        $btn = "
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<form method = 'post' action = \"/appmerchant/subsubcompany/delete/$id/\">
							".csrf_field(). method_field('DELETE') ."
							<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
							<input type=\"hidden\" name=\"_token\" value=\"$token\">
							<input type = 'submit' value = 'Delete' 
							onclick='return confirm(\"are you sure you want to remove this item\");'/
							class=\"btn btn-danger\">
							</form>
						</div>
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<a href=\"/appmerchant/editsubsubcompany/$id/$compid/$subcompid\" class=\"edit btn btn-primary btn-sm\">Edit </a>
							<a href=\"/appmerchant/addprod/$compid/$subcompid/$id\" class=\"edit btn btn-primary btn-sm\">Add Product </a>
							<a href=\"/appmerchant/viewprod/$compid/$subcompid/$id\" class=\"edit btn btn-primary btn-sm\">Products </a>
						</div>
						";
                        return $btn;
                    })	
					->addColumn('Name', function($row)
					{
						$name = $row['name'];
				
						return $name;
                    })
					->rawColumns(array("action", "Name" , 'Company', 'SubCompany', 'Delete1' , 'Image'))
                    ->make(true);
        }	
		return view('appmerchant.viewsubsubcompany'  , compact( 'compid' , 'subcompid'));
	}
	
	public function edit($id , $compid , $subcompid)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$comps = Company::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subcomps = Subcompany::orderBy('name', 'ASC')->get();
		$row = Subsubcompany::where('userid', '=', $userid)->where('id', '=', $id)->first();
		return view('appmerchant.editsubsubcompany', compact('row' , 'comps'  , 'subcomps'));
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
		if($request->file('img'))
        {
			$file = $request->file('img');
			$imageName = time().'.'.$request->img->extension(); 
			
			$destinationPath = public_path().'/images/subsubcompany/thumb';
			$img = Image::make($file->path());
			$img->resize(180, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath.'/'.$imageName);
			$request->img->move(public_path().'/images/subsubcompany/', $imageName);
			//echo " image name A $imageName " ;
        }
		else
		$imageName ='';

		try
		{
		//name	userid	countryid	catid	conf	realer	branchnum	phone	website	facebook	twiter	insta	prodtypnum	defpublic
			$row =Subsubcompany::create([ 'name' => $request->name ,'userid' => "$userid" ,
			'compid' => "$compid" ,'subcompid' => "$subcompid" , 'logo' => $imageName 
			]);
			$row->save();
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
			//echo "message $message ";
		}
		
		
		return Redirect::route('viewsubsubCompany.route')->with("message","Thank you for taking this sub sub company");	
	}
	
	public function update(Request $request, $id)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$this->validate($request, [
		'name' => 'required' , 'compid' => 'required'  , 'subcompid' => 'required'
		]);
		
		
		
		$userid = Auth::id();
		
		if($request->file('img'))
        {
			$file = $request->file('img');
			$imageName = time().'.'.$request->img->extension(); 
			
			$destinationPath = public_path().'/images/subsubcompany/thumb';
			$img = Image::make($file->path());
			$img->resize(180, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath.'/'.$imageName);
			$request->img->move(public_path().'/images/subsubcompany/', $imageName);
			//echo " image name A $imageName " ;
        }
		else
		{
			$pic = $request->pic;
			if($pic != "")
				$imageName = $pic;
			else
				$imageName ='';
		}
		//print_r($cityid);
		//print_r($prodtyp);
		
		$subcompid = $request->subcompid;
		$compid = $request->compid;
		
		$row = Subsubcompany::where('userid', '=', $userid)->where('id', '=', $id)->first();
		try
		{
			$row->update([
			'name' => $request->name , 'logo' => $imageName ,
			'compid' => "$compid" ,'subcompid' => "$subcompid"
			]);
			
			$LastInsertId = $id;
		
	
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
		}
		return Redirect::route('viewsubsubCompany.route');
	}	



	public function destroy($id )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$row =Subsubcompany::where('subsubcompanies.userid', '=', $userid)->where('subsubcompanies.id', '=', $id)->first();
		$row->delete();
		return Redirect::route('viewsubsubCompany.route');
	}
	
	
	public function destroyall(Request $request )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		if($request->idx && is_array($request->idx))
		{
			foreach($request->idx as $id)
			{
				$row = Subsubcompany::where('subsubcompanies.userid', '=', $userid)->where('subsubcompanies.id', '=', $id)->first();
				$row->delete();
			}
		}
		return Redirect::route('viewsubsubCompany.route');
	}
	
	
	
}

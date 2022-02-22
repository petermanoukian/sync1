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
use Image;
use DataTables;



class SubcompanyController extends Controller
{
    
	public function __construct()
    {

    }  

	public function getSubcompAjax(Request $request)
    {
		
		$userid = Auth::id();
		if($request->subcompid != "")
		{
			$subcompid = $request->subcompid;
		}
		else
		{
			$subcompid = '';
		}
		if($request->compid != "")
		{
			$html = '<select class="form-control" name = "subcompid" id="subcompid" required>
			<option value = "">Choose Subcompany</option>';
			$subcats = Subcompany::where('compid', $request->compid)->where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
			$count = count($subcats);
			if($subcats && !empty($subcats) && $count > 0)
			{
				foreach ($subcats as $subcat) 
				{
					if($subcompid != "" && $subcompid == $subcat->id)
					$html .= '<option value="'.$subcat->id.'" selected>'.$subcat->name.'</option>';
					else
					$html .= '<option value="'.$subcat->id.'">'.$subcat->name.'</option>';
				}
			
				$html .= "</select>";
			}
			else 
			$html = '<select class="form-control" name = "subcompid" id="subcompid" required></select> ';
		}
		else
		$html = 'Choose A Sub Company';
    	return response()->json(['html' => $html]);
    }


	
	
	public function create($compid='' , $subcompid= '')
    {
        $this->middleware(['auth','is_merchant' ,'conf1','conf2']);
		$userid = Auth::id();
		$comps = Company::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$typs = Typesubcompany::orderBy('name', 'ASC')->get();
		return view('appmerchant/addsubcompany' , compact('comps' , 'typs', 'compid' , 'subcompid'));
    }
	
	public function indexadmin(Request $request , $compid='')
	{
		$this->middleware(['auth','is_merchant' ,'conf1','conf2']);	
		$sess = session_id();
		$token =  $request->session()->token();	
		$userid = Auth::id();
		//echo " userid ::: $userid  ";
		
		if ($request->ajax()) {
			
			if($compid != "" && $compid != NULL)
			{
				$data = Subcompany::with(['company'])->with(['typesub'])->where('subcompanies.userid', '=', $userid)
				->where('subcompanies.compid', '=', $compid)
				->orderBy('subcompanies.id', 'DESC')->get();
			}
			else
			{
				$data = Subcompany::with(['company'])->with(['typesub'])->where('subcompanies.userid', '=', $userid)
				->orderBy('subcompanies.id', 'DESC')->get();
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
							return $compname;
					})
					->addColumn('Type', function($row){
							$typ = $row['typesub']['name'];	
							return $typ;
					})
					
					->addColumn('Image', function($row) use ($token){
     					$id = $row['id'];
						$img = $row['logo'];
						if($img !='')
						{
							$path = asset('/images/subcompany/thumb/'.$img);	
							$btn2 = " <img src = \"$path\" style = 'max-width:180px;' />";
						}
						else						
							$btn2 = "no picture";
                        return $btn2;
                    })
                    ->addColumn('action', function($row) use ($token){
     					$id = $row['id'];
						$compid = $row['compid'];
						
						//$count = $row['subcats_count'];
                        $btn = "
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<form method = 'post' action = \"/appmerchant/subcompany/delete/$id/\">
							".csrf_field(). method_field('DELETE') ."
							<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
							<input type=\"hidden\" name=\"_token\" value=\"$token\">
							<input type = 'submit' value = 'Delete' onclick = 'return confirm(\"are you sure you want to remove this item\");'/
							class=\"btn btn-danger\">
							</form>
						</div>
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<a href=\"/appmerchant/editsubcompany/$id\" class=\"edit btn btn-primary btn-sm\">Edit </a>
							<a href=\"/appmerchant/addsubsubcompany/$compid/$id\" class=\"edit btn btn-primary btn-sm\">Add Sub Sub Company </a>
							<a href=\"/appmerchant/viewsubsubcompany/$compid/$id\" class=\"edit btn btn-primary btn-sm\">Sub Sub Companies </a>
							<a href=\"/appmerchant/addprod/$compid/$id\" class=\"edit btn btn-primary btn-sm\">Add Product </a>
							<a href=\"/appmerchant/viewprod/$compid/$id\" class=\"edit btn btn-primary btn-sm\">Products </a>
						</div>
						";
                        return $btn;
                    })	
					->addColumn('Name', function($row)
					{
						$name = $row['name'];
				
						return $name;
                    })
					->rawColumns(array("action", "Name" , 'Company','Type', 'Delete1' , 'Image'))
                    ->make(true);
        }	
		return view('appmerchant.viewsubcompany' , compact('compid' ));
	}
	
	public function edit($id)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$comps = Company::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$typs = Typesubcompany::orderBy('name', 'ASC')->get();
		$row =Subcompany::where('userid', '=', $userid)->where('id', '=', $id)->first();
		return view('appmerchant.editsubcompany', compact('row' , 'comps'  , 'typs'));
	}

	public function store(Request $request)
	{

		
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$this->validate($request, [
		'name' => 'required' , 'compid' => 'required'  , 'typesubcompid' => 'required'
		]);
		$userid = Auth::id();
		$typesubcompid = $request->typesubcompid;
		$compid = $request->compid;
		if($request->file('img'))
        {
			$file = $request->file('img');
			$imageName = time().'.'.$request->img->extension(); 
			
			$destinationPath = public_path().'/images/subcompany/thumb';
			$img = Image::make($file->path());
			$img->resize(180, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath.'/'.$imageName);
			$request->img->move(public_path().'/images/subcompany/', $imageName);
			//echo " image name A $imageName " ;
        }
		else
		$imageName ='';

		try
		{
		//name	userid	countryid	catid	conf	realer	branchnum	phone	website	facebook	twiter	insta	prodtypnum	defpublic
			$row =Subcompany::create([ 'name' => $request->name ,'userid' => "$userid" ,
			'compid' => "$compid" ,'typesubcompid' => "$typesubcompid" , 'logo' => $imageName 
			]);
			$row->save();
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
			//echo "message $message ";
		}
		echo "here ";
		return Redirect::route('viewsubCompany.route')->with("message","Thank you for taking this sub company");	
	}
	
	public function update(Request $request, $id)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$this->validate($request, [
		'name' => 'required' , 'compid' => 'required'  , 'typesubcompid' => 'required'
		]);
		
		
		
		$userid = Auth::id();
		
		if($request->file('img'))
        {
			$file = $request->file('img');
			$imageName = time().'.'.$request->img->extension(); 
			
			$destinationPath = public_path().'/images/subcompany/thumb';
			$img = Image::make($file->path());
			$img->resize(180, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath.'/'.$imageName);
			$request->img->move(public_path().'/images/subcompany/', $imageName);
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
		
				$typesubcompid = $request->typesubcompid;
		$compid = $request->compid;
		
		$row =Subcompany::where('userid', '=', $userid)->where('id', '=', $id)->first();
		try
		{
			$row->update([
			'name' => $request->name , 'logo' => $imageName ,
			'compid' => "$compid" ,'typesubcompid' => "$typesubcompid"
			]);
			
			$LastInsertId = $id;
		
	
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
		}
		return Redirect::route('viewsubCompany.route');
	}	



	public function destroy($id )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$row =Subcompany::where('subcompanies.userid', '=', $userid)->where('subcompanies.id', '=', $id)->first();
		$row->delete();
		return Redirect::route('viewsubCompany.route');
	}
	
	
	public function destroyall(Request $request )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		if($request->idx && is_array($request->idx))
		{
			foreach($request->idx as $id)
			{
				$row = Subcompany::where('subcompanies.userid', '=', $userid)->where('subcompanies.id', '=', $id)->first();
				$row->delete();
			}
		}
		return Redirect::route('viewsubCompany.route');
	}
	
	
	
	
}

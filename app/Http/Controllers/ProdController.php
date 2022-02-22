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
use App\Models\Prod;
use Image;
use DataTables;



class ProdController extends Controller
{
    public function __construct()
    {

    }   
	
	public function create($compid='' , $subcompid='' , $subsubcompid='')
    {
        $this->middleware(['auth','is_merchant' ,'conf1','conf2']);
		$userid = Auth::id();
		$comps = Company::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subcomps = Subcompany::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subsubcomps = Subsubcompany::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		return view('appmerchant/addprod' , compact('comps' , 'subcomps', 'subsubcomps', 'compid' , 'subcompid' , 'subsubcompid'));
    }
	
	public function indexadmin(Request $request , $compid='' , $subcompid='' , $subsubcompid='')
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
					
					if($subsubcompid != "" && $subsubcompid != NULL && $subsubcompid != '0')
					{
						$data = Prod::with(['company'])->with(['subcompany'])->with(['subsubcompany'])
						->where('prods.userid', '=', $userid)
						->where('prods.compid', '=', $compid)
						->where('prods.subcompid', '=', $subcompid)
						->where('prods.subsubcompid', '=', $subsubcompid)
						->orderBy('prods.id', 'DESC')->get();
					}
					else
					{
						$data = Prod::with(['company'])->with(['subcompany'])->with(['subsubcompany'])
						->where('prods.userid', '=', $userid)
						->where('prods.compid', '=', $compid)
						->where('prods.subcompid', '=', $subcompid)
						->orderBy('prods.id', 'DESC')->get();
					}
				}
				else
				{
					$data = Prod::with(['company'])->with(['subcompany'])->with(['subsubcompany'])
					->where('prods.userid', '=', $userid)
					->where('prods.compid', '=', $compid)
					->orderBy('prods.id', 'DESC')->get();
				}	
			}
			else
			{
				$data = Prod::with(['company'])->with(['subcompany'])->with(['subsubcompany'])
				->where('prods.userid', '=', $userid)
				->orderBy('prods.id', 'DESC')->get();
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
					->addColumn('SubsubCompany', function($row){
							$subsubcompname = $row['subsubcompany']['name'];	
							return $subsubcompname;
					})
					->addColumn('Image', function($row) use ($token){
     					$id = $row['id'];
						$img = $row['logo'];
						if($img !='')
						{
							$path = asset('/images/prod/thumb/'.$img);	
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
						$subsubcompid = $row['subsubcompid'];
						
						if($subsubcompid  == '')
							$subsubcompid = 0;
						
						//$count = $row['subcats_count'];
                        $btn = "
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<form method = 'post' action = \"/appmerchant/prod/delete/$id/\">
							".csrf_field(). method_field('DELETE') ."
							<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
							<input type=\"hidden\" name=\"_token\" value=\"$token\">
							<input type = 'submit' value = 'Delete' 
							onclick='return confirm(\"are you sure you want to remove this item\");'/
							class=\"btn btn-danger\">
							</form>
						</div>
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<a href=\"/appmerchant/editprod/$id/$compid/$subcompid/$subsubcompid\" class=\"edit btn btn-primary btn-sm\">
							Edit </a>
						</div>
						";
                        return $btn;
                    })	
					->addColumn('Name', function($row)
					{
						$name = $row['name'];
				
						return $name;
                    })
					->rawColumns(array("action", "Name",'Company','SubCompany','SubsubCompany', 'Delete1' , 'Image'))
                    ->make(true);
        }	
		return view('appmerchant.viewprod'  , compact( 'compid' , 'subcompid' , 'subsubcompid'));
	}
	
	public function edit($id , $compid , $subcompid , $subsubcompid)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$comps = Company::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subcomps = Subcompany::orderBy('name', 'ASC')->get();
		$subsubcomps = Subsubcompany::orderBy('name', 'ASC')->get();
		$row = Subsubcompany::where('userid', '=', $userid)->where('id', '=', $id)->first();
		return view('appmerchant.editprod', compact('row','comps','subcomps','subsubcomps','compid','subcompid','subsubcompid'));
	}

	public function store(Request $request)
	{
	
		
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$this->validate($request, [
		'name' => 'required' , 'compid' => 'required'  , 'subcompid' => 'required'
		]);
		$userid = Auth::id();
		$subcompid = $request->subcompid;
		$subsubcompid = $request->subsubcompid;
		if($subsubcompid  == '')
			$subsubcompid = 0;
		$compid = $request->compid;
		$prix = $request->prix;
		$des = $request->des;
		$dess = $request->dess;
		$prix = $request->prix;
		if($request->file('img'))
        {
			$file = $request->file('img');
			$imageName = time().'.'.$request->img->extension(); 
			
			$destinationPath = public_path().'/images/prod/thumb';
			$img = Image::make($file->path());
			$img->resize(180, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath.'/'.$imageName);
			$request->img->move(public_path().'/images/prod/', $imageName);
			//echo " image name A $imageName " ;
        }
		else
		$imageName ='';

		try
		{
		//name	userid	countryid	catid	conf	realer	branchnum	phone	website	facebook	twiter	insta	prodtypnum	defpublic
			$row = Prod::create([ 'name' => $request->name ,'userid' => "$userid" ,
			'compid' => "$compid" ,'subcompid' => "$subcompid" , 'subsubcompid' => "$subsubcompid" ,
			'prix' => "$prix" ,'des' => "$des" , 'dess' => "$dess" ,'logo' => $imageName 
			]);
			$row->save();
			return Redirect::route('viewProd.route')->with("message","Thank you for taking this item");	
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
			echo "message $message ";
		}
		
		
		
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
		$subsubcompid = $request->subsubcompid;
		$subcompid = $request->subcompid;
		$compid = $request->compid;
		
		if($subsubcompid  == '')
			$subsubcompid = 0;
		
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Typesubcompany;
use App\Models\Company;
use App\Models\Subcompany;
use App\Models\Subsubcompany;

use App\Models\Cat;
use App\Models\Subcat;
use App\Models\Subsubcat;



use App\Models\Prod;
use Image;
use DataTables;



class ProdController extends Controller
{
    public function __construct()
    {

    }   
	
	public function create($compid='' , $subcompid='' , $subsubcompid='' , $catid='' , $subcatid='' , $subsubcatid='')
    {
        $this->middleware(['auth','is_merchant' ,'conf1','conf2']);
		$userid = Auth::id();
		$comps = Company::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subcomps = Subcompany::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subsubcomps = Subsubcompany::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		
		$cats = Cat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subcats = Subcat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subsubcats = Subsubcat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();

		return view('appmerchant/addprod' , compact('comps' , 'subcomps', 'subsubcomps', 'cats' , 'subcats', 'subsubcats', 'compid' , 'subcompid' , 'subsubcompid' , 'catid' , 'subcatid' , 'subsubcatid'));
    }
	
	public function indexadmin(Request $request , $compid='' , $subcompid='' , $subsubcompid='' , $catid='' , $subcatid='' , $subsubcatid='')
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
						->with(['cat'])->with(['subcat'])->with(['subsubcat'])
						->where('prods.userid', '=', $userid)
						->where('prods.compid', '=', $compid)
						->where('prods.subcompid', '=', $subcompid)
						->where('prods.subsubcompid', '=', $subsubcompid)
						->orderBy('prods.id', 'DESC')->get();
					}
					else
					{
						$data = Prod::with(['company'])->with(['subcompany'])->with(['subsubcompany'])
						->with(['cat'])->with(['subcat'])->with(['subsubcat'])
						->where('prods.userid', '=', $userid)
						->where('prods.compid', '=', $compid)
						->where('prods.subcompid', '=', $subcompid)
						->orderBy('prods.id', 'DESC')->get();
					}
				}
				else
				{
					$data = Prod::with(['company'])->with(['subcompany'])->with(['subsubcompany'])
					->with(['cat'])->with(['subcat'])->with(['subsubcat'])
					->where('prods.userid', '=', $userid)
					->where('prods.compid', '=', $compid)
					->orderBy('prods.id', 'DESC')->get();
				}	
			}
			else
			{
				$data = Prod::with(['company'])->with(['subcompany'])->with(['subsubcompany'])
				->with(['cat'])->with(['subcat'])->with(['subsubcat'])
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
						
						
						$catid = $row['catid'];
						$subcatid = $row['subcatid'];
						$subsubcatid = $row['subsubcatid'];
						
						if($subsubcatid  == '')
							$subsubcatid = 0;
						
						
						
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
							<a href=\"/appmerchant/editprod/$id/$compid/$subcompid/$subsubcompid/$catid/$subcatid/$subsubcatid\" 
							class=\"edit btn btn-primary btn-sm\">
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
		return view('appmerchant.viewprod'  , compact( 'compid' , 'subcompid' , 'subsubcompid' , 'catid' , 'subcatid' , 'subsubcatid'));
	}
	
	
	
	
	
	
	
	public function createbycat($catid='' , $subcatid='' , $subsubcatid='' , $compid='' , $subcompid='' , $subsubcompid='')
    {
        $this->middleware(['auth','is_merchant' ,'conf1','conf2']);
		$userid = Auth::id();
		$comps = Company::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subcomps = Subcompany::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subsubcomps = Subsubcompany::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		
		$cats = Cat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subcats = Subcat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subsubcats = Subsubcat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		
		
		return view('appmerchant/addprodbycat' , compact('comps','subcomps','subsubcomps','cats','subcats','subsubcats','catid','subcatid','subsubcatid'));
    }
	
	public function indexadminbycat(Request $request , $catid='' , $subcatid='' , $subsubcatid='' , $compid='' , $subcompid='' , $subsubcompid='')
	{
		$this->middleware(['auth','is_merchant' ,'conf1','conf2']);	
		$sess = session_id();
		$token =  $request->session()->token();	
		$userid = Auth::id();
		//echo " userid ::: $userid  ";
		
		if ($request->ajax()) {	
			if($catid != "" && $catid != NULL)
			{
				if($subcatid != "" && $subcatid != NULL)
				{
					
					if($subsubcatid != "" && $subsubcatid != NULL && $subsubcatid != '0')
					{
						$data = Prod::with(['company'])->with(['subcompany'])->with(['subsubcompany'])
						->with(['cat'])->with(['subcat'])->with(['subsubcat'])
						->where('prods.userid', '=', $userid)
						->where('prods.compid', '=', $compid)
						->where('prods.subcompid', '=', $subcompid)
						->where('prods.subsubcompid', '=', $subsubcompid)
						->orderBy('prods.id', 'DESC')->get();
					}
					else
					{
						$data = Prod::with(['company'])->with(['subcompany'])->with(['subsubcompany'])
						->with(['cat'])->with(['subcat'])->with(['subsubcat'])
						->where('prods.userid', '=', $userid)
						->where('prods.compid', '=', $compid)
						->where('prods.subcompid', '=', $subcompid)
						->orderBy('prods.id', 'DESC')->get();
					}
				}
				else
				{
					$data = Prod::with(['company'])->with(['subcompany'])->with(['subsubcompany'])
					->with(['cat'])->with(['subcat'])->with(['subsubcat'])
					->where('prods.userid', '=', $userid)
					->where('prods.compid', '=', $compid)
					->orderBy('prods.id', 'DESC')->get();
				}	
			}
			else
			{
				$data = Prod::with(['company'])->with(['subcompany'])->with(['subsubcompany'])
				->with(['cat'])->with(['subcat'])->with(['subsubcat'])
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
					
					->addColumn('Cat', function($row){
							$catname = $row['cat']['name'];
							return $catname;
					})
					->addColumn('SubCat', function($row){
							$subcatname = $row['subcat']['name'];	
							return $subcatname;
					})
					->addColumn('SubsubCat', function($row){
							$subsubcatname = $row['subsubcat']['name'];	
							return $subsubcatname;
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
						
						$catid = $row['catid'];
						$subcatid = $row['subcatid'];
						$subsubcatid = $row['subsubcatid'];
						
						if($subsubcatid  == '')
							$subsubcatid = 0;

                        $btn = "
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<form method = 'post' action = \"/appmerchant/prodbycat/delete/$id/\">
							".csrf_field(). method_field('DELETE') ."
							<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
							<input type=\"hidden\" name=\"_token\" value=\"$token\">
							<input type = 'submit' value = 'Delete' 
							onclick='return confirm(\"are you sure you want to remove this item\");'/
							class=\"btn btn-danger\">
							</form>
						</div>
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<a href=\"/appmerchant/editprodbycat/$id/$compid/$subcompid/$subsubcompid/$catid/$subcatid/$subsubcatid\" 
							class=\"edit btn btn-primary btn-sm\">
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
					->rawColumns(array("action", "Name",'Cat','SubCat','SubsubCat', 'Delete1' , 'Image'))
                    ->make(true);
        }	
		return view('appmerchant.viewprodbycat'  , compact('catid','subcatid','subsubcatid' ,'compid','subcompid','subsubcompid'));
	}
	

	
	
	public function edit($id , $compid , $subcompid , $subsubcompid  , $catid , $subcatid , $subsubcatid)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$comps = Company::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subcomps = Subcompany::orderBy('name', 'ASC')->get();
		$subsubcomps = Subsubcompany::orderBy('name', 'ASC')->get();
		
		$cats = Cat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subcats = Subcat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subsubcats = Subsubcat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();

		$row = Prod::where('userid', '=', $userid)->where('id', '=', $id)->first();
		return view('appmerchant.editprod', compact('row','comps','subcomps','subsubcomps','cats','subcats','subsubcats','compid','subcompid','subsubcompid' ,'catid','subcatid','subsubcatid'));
	}
	
	
	public function editbycat($id , $compid , $subcompid , $subsubcompid  , $catid , $subcatid , $subsubcatid)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$comps = Company::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subcomps = Subcompany::orderBy('name', 'ASC')->get();
		$subsubcomps = Subsubcompany::orderBy('name', 'ASC')->get();
		
		$cats = Cat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subcats = Subcat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subsubcats = Subsubcat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();

		$row = Prod::where('userid', '=', $userid)->where('id', '=', $id)->first();
		return view('appmerchant.editprodbycat', compact('row','comps','subcomps','subsubcomps','cats','subcats','subsubcats','compid','subcompid','subsubcompid' ,'catid','subcatid','subsubcatid'));
	}
	
	
	

	public function store(Request $request)
	{
	
		
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$this->validate($request, [
		'name' => 'required' , 'compid' => 'required'  , 'subcompid' => 'required'
		]);
		$userid = Auth::id();
		$compid = $request->compid;
		$subcompid = $request->subcompid;
		$subsubcompid = $request->subsubcompid;
		if($subsubcompid  == '')
			$subsubcompid = 0;
		
		
		$catid = $request->catid;
		$subcatid = $request->subcatid;
		$subsubcatid = $request->subsubcatid;
		if($subsubcatid  == '')
			$subsubcatid = 0;

		
		$prix = $request->prix;
		$des = $request->des;
		$dess = $request->dess;
		
		$redirector = $request->redirector;
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
			'catid' => "$catid" ,'subcatid' => "$subcatid" , 'subsubcatid' => "$subsubcatid" ,
			'prix' => "$prix" ,'des' => "$des" , 'dess' => "$dess" ,'logo' => $imageName 
			]);
			$row->save();
			if($redirector == 'compsection')
			return Redirect::route('viewProd.route')->with("message","Thank you for taking this item");	
			else if($redirector == 'catsection')
			return Redirect::route('viewProdbycat.route')->with("message","Thank you for taking this item");	
			else
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
			
			$destinationPath = public_path().'/images/prod/thumb';
			$img = Image::make($file->path());
			$img->resize(180, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath.'/'.$imageName);
			$request->img->move(public_path().'/images/prod/', $imageName);
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

		$subsubcompid = $request->subsubcompid;
		$subcompid = $request->subcompid;
		$compid = $request->compid;	
		$catid = $request->catid;
		$subcatid = $request->subcatid;
		$subsubcatid = $request->subsubcatid;
		if($subsubcatid  == '')
			$subsubcatid = 0;
		if($subsubcompid  == '')
			$subsubcompid = 0;
		
		$redirector = $request->redirector;
		
		$prix = $request->prix;
		$des = $request->des;
		$dess = $request->dess;
		
		
		$row = Prod::where('userid', '=', $userid)->where('id', '=', $id)->first();
		try
		{
			$row->update([
			'name' => $request->name , 'logo' => $imageName ,
			'catid' => "$catid" ,'subcatid' => "$subcatid" , 'subsubcatid' => "$subsubcatid" ,
			'compid' => "$compid" ,'subcompid' => "$subcompid" , 'subsubcompid' => "$subsubcompid" ,
			'prix' => "$prix" ,'des' => "$des" , 'dess' => "$dess" 
			]);	
			$LastInsertId = $id;
			
			
			if($redirector == 'compsection')
			return Redirect::route('viewProd.route')->with("message","Thank you for taking this item");	
			else if($redirector == 'catsection')
			return Redirect::route('viewProdbycat.route')->with("message","Thank you for taking this item");	
			else
			return Redirect::route('viewProd.route')->with("message","Thank you for taking this item");	
			
			echo "updated";
			
			
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
			echo " message $message ";
		}
		//return Redirect::route('viewProd.route');
	}	



	public function destroy($id )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$row =Prod::where('userid', '=', $userid)->where('id', '=', $id)->first();
		$row->delete();
		return Redirect::route('viewProd.route');
	}
	
	
	public function destroyall(Request $request )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		if($request->idx && is_array($request->idx))
		{
			foreach($request->idx as $id)
			{
				$row =Prod::where('userid', '=', $userid)->where('id', '=', $id)->first();
				$row->delete();
			}
		}
		return Redirect::route('viewProd.route');
	}
	
	
	public function destroybycat($id )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$row =Prod::where('userid', '=', $userid)->where('id', '=', $id)->first();
		$row->delete();
		return Redirect::route('viewProdbycat.route');
	}
	
	
	public function destroyallbycat(Request $request )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		if($request->idx && is_array($request->idx))
		{
			foreach($request->idx as $id)
			{
				$row =Prod::where('userid', '=', $userid)->where('id', '=', $id)->first();
				$row->delete();
			}
		}
		return Redirect::route('viewProdbycat.route');
	}
	
	
	
	
}

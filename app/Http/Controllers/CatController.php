<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Cat;
use App\Models\User;
use Image;
use DataTables;


class CatController extends Controller
{
    public function __construct()
    {

    }   
	
	public function create()
    {
        $this->middleware(['auth','is_merchant' ,'conf1','conf2']);
		return view('appmerchant/addcat');
    }
	
	public function indexadmin(Request $request)
	{
		$this->middleware(['auth','is_merchant' ,'conf1','conf2']);	
		$sess = session_id();
		$token =  $request->session()->token();	
		$userid = Auth::id();
		//echo " userid ::: $userid  ";
		
		if ($request->ajax()) {
            $data = Cat::where('userid', '=', $userid)->orderBy('id', 'DESC')->get();
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
					->addColumn('Image', function($row) use ($token){
     					$id = $row['id'];
						$img = $row['logo'];
						if($img !='')
						{
							$path = asset('/images/cat/thumb/'.$img);	
							$btn2 = " <img src = \"$path\" style = 'max-width:180px;' />";
						}
						else						
							$btn2 = "no picture";
                        return $btn2;
                    })
                    ->addColumn('action', function($row) use ($token){
     					$id = $row['id'];
                        $btn = "
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<form method = 'post' action = \"/appmerchant/cat/delete/$id/\">
							".csrf_field(). method_field('DELETE') ."
							<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
							<input type=\"hidden\" name=\"_token\" value=\"$token\">
							<input type = 'submit' value = 'Delete' onclick = 'return confirm(\"are you sure you want to remove this item\");'/
							class=\"btn btn-danger\">
							</form>
						</div>
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<a href=\"/appmerchant/editcat/$id\" class=\"edit btn btn-primary btn-sm\">Edit </a>
							<a href=\"/appmerchant/addsubcat/$id\" class=\"edit btn btn-primary btn-sm\">Add Subcategory </a>
							<a href=\"/appmerchant/viewsubcat/$id\" class=\"edit btn btn-primary btn-sm\">Subcategories </a>	
							<a href=\"/appmerchant/addsubsubcat/$id\" class=\"edit btn btn-primary btn-sm\">Add Sub Subcategory </a>
							<a href=\"/appmerchant/viewsubsubcat/$id\" class=\"edit btn btn-primary btn-sm\">Sub Subcategories </a>
							<a href=\"/appmerchant/addprodbycat/$id\" class=\"edit btn btn-primary btn-sm\">Add Product </a>
							<a href=\"/appmerchant/viewprodbycat/$id\" class=\"edit btn btn-primary btn-sm\">Products </a>
						</div>
						";
                        return $btn;
                    })	
					->addColumn('Name', function($row)
					{
						$name = $row['name'];
				
						return $name;
                    })
					->rawColumns(array("action", "Name" ,  'Delete1' , 'Image'))
                    ->make(true);
        }
		
		return view('appmerchant.viewcat');
	}
	
	public function edit($id)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$row =Cat::where('userid', '=', $userid)->where('id', '=', $id)->first();
		return view('appmerchant.editcat', compact('row' ));
	}

	public function store(Request $request)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$this->validate($request, [
		'name' => 'required' 
		]);
		$userid = Auth::id();
		
		if($request->file('img'))
        {
			$file = $request->file('img');
			$imageName = time().'.'.$request->img->extension(); 
			
			$destinationPath = public_path().'/images/cat/thumb';
			$img = Image::make($file->path());
			$img->resize(180, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath.'/'.$imageName);
			$request->img->move(public_path().'/images/cat/', $imageName);
			//echo " image name A $imageName " ;
        }
		else
		$imageName ='';

		try
		{
		//name	userid	countryid	catid	conf	realer	branchnum	phone	website	facebook	twiter	insta	prodtypnum	defpublic
			$row =Cat::create([ 'name' => $request->name ,'userid' => "$userid" ,
			'logo' => $imageName 
			]);
			$row->save();
			//echo "saved";
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
			echo "message $message ";
		}
		return Redirect::route('viewCat.route')->with("message","Thank you for taking this record");	
	}
	
	public function update(Request $request, $id)
	{

		$this->validate($request, [
		'name' => 'required' 
		]);
		$userid = Auth::id();
		
		if($request->file('img'))
        {
			$file = $request->file('img');
			$imageName = time().'.'.$request->img->extension(); 	
			$destinationPath = public_path().'/images/cat/thumb';
			$img = Image::make($file->path());
			$img->resize(180, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath.'/'.$imageName);
			$request->img->move(public_path().'/images/cat/', $imageName);
        }
		else
		{
			$pic = $request->pic;
			if($pic != "")
				$imageName = $pic;
			else
				$imageName ='';
		}

		$row =Cat::where('userid', '=', $userid)->where('id', '=', $id)->first();
		try
		{
			$row->update([
			'name' => $request->name , 'logo' => $imageName 
			]);	
			$LastInsertId = $id;
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
		}
		return Redirect::route('viewCat.route');
	}	



	public function destroy($id )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$row =Cat::with(['subcats'])->
					   with(['subsubcats'])->
					   where('cats.userid', '=', $userid)->where('cats.id', '=', $id)->first();
		$row->subsubcats()->delete();
		$row->subcats()->delete();
		
		$row->delete();
		return Redirect::route('viewCat.route');
	}
	
	
	public function destroyall(Request $request )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		if($request->idx && is_array($request->idx))
		{
			foreach($request->idx as $id)
			{
				$row = Cat::with(['subcats'])->
						with(['subsubcats'])
				->where('cats.userid', '=', $userid)->where('cats.id', '=', $id)->first();
				$row->subsubcats()->delete();
				$row->subcats()->delete();
				$row->delete();
			}
		}
		return Redirect::route('viewCat.route');
	}

}

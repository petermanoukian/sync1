<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Cat;
use App\Models\User;
use App\Models\Subcat;
use Image;
use DataTables;

class SubcatController extends Controller
{
    public function __construct()
    {

    }  

	public function getSubcatAjax(Request $request)
    {
		
		$userid = Auth::id();
		if($request->subcatid != "")
		{
			$subcatid = $request->subcatid;
		}
		else
		{
			$subcatid = '';
		}
		
		if($request->catid != "")
		{
			$html = '<select class="form-control form-control-lg form-control-solid" name = "subcatid" id="subcatid" required>
			<option value = "">Choose Subcompany</option>';
			$subcats = Subcat::where('catid', $request->catid)->where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
			$count = count($subcats);
			if($subcats && !empty($subcats) && $count > 0)
			{
				foreach ($subcats as $subcat) 
				{
					if($subcatid != "" && $subcatid == $subcat->id)
					$html .= '<option value="'.$subcat->id.'" selected>'.$subcat->name.'</option>';
					else
					$html .= '<option value="'.$subcat->id.'">'.$subcat->name.'</option>';
				}
			
				$html .= "</select>";
			}
			else 
			$html = '<select class="form-control form-control-lg form-control-solid" name = "subcatid" id="subcatid" required></select> ';
		}
		else
		$html = 'Choose A Sub Category';
    	return response()->json(['html' => $html]);
    }


	
	
	public function create($catid='' , $subcatid= '')
    {
        $this->middleware(['auth','is_merchant' ,'conf1','conf2']);
		$userid = Auth::id();
		$cats = Cat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();	
		return view('appmerchant/addsubcat' , compact('cats' , 'catid' , 'subcatid'));
    }
	
	public function indexadmin(Request $request , $catid='')
	{
		$this->middleware(['auth','is_merchant' ,'conf1','conf2']);	
		$sess = session_id();
		$token =  $request->session()->token();	
		$userid = Auth::id();
		//echo " userid ::: $userid  ";
		
		if ($request->ajax()) {
			
			if($catid != "" && $catid != NULL)
			{
				$data = Subcat::with(['cat'])->where('subcats.userid', '=', $userid)
				->where('subcats.catid', '=', $catid)
				->orderBy('subcats.id', 'DESC')->get();
			}
			else
			{
				$data = Subcat::with(['cat'])->where('subcats.userid', '=', $userid)
				->orderBy('subcats.id', 'DESC')->get();
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

					
					->addColumn('Image', function($row) use ($token){
     					$id = $row['id'];
						$img = $row['logo'];
						if($img !='')
						{
							$path = asset('/images/subcat/thumb/'.$img);	
							$btn2 = " <img src = \"$path\" style = 'max-width:180px;' />";
						}
						else						
							$btn2 = "no picture";
                        return $btn2;
                    })
                    ->addColumn('action', function($row) use ($token){
     					$id = $row['id'];
						$catid = $row['catid'];
                        $btn = "
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<form method = 'post' action = \"/appmerchant/subcat/delete/$id/\">
							".csrf_field(). method_field('DELETE') ."
							<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
							<input type=\"hidden\" name=\"_token\" value=\"$token\">
							<input type = 'submit' value = 'Delete' onclick = 'return confirm(\"are you sure you want to remove this item\");'/
							class=\"btn btn-danger\">
							</form>
						</div>
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<a href=\"/appmerchant/editsubcat/$id\" class=\"edit btn btn-primary btn-sm\">Edit </a>
							<a href=\"/appmerchant/addsubsubcat/$catid/$id\" class=\"edit btn btn-primary btn-sm\">Add Sub Sub Company </a>
							<a href=\"/appmerchant/viewsubsubcat/$catid/$id\" class=\"edit btn btn-primary btn-sm\">Sub Sub Companies </a>
							<a href=\"/appmerchant/addprodbycat/$catid/$id\" class=\"edit btn btn-primary btn-sm\">Add Product </a>
							<a href=\"/appmerchant/viewprodbycat/$catid/$id\" class=\"edit btn btn-primary btn-sm\">Products </a>
						</div>
						";
                        return $btn;
                    })	
					->addColumn('Name', function($row)
					{
						$name = $row['name'];
				
						return $name;
                    })
					->rawColumns(array("action", "Name" , 'Cat', 'Delete1' , 'Image'))
                    ->make(true);
        }	
		return view('appmerchant.viewsubcat' , compact('catid' ));
	}
	
	public function edit($id)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$cats = Cat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$row =Subcat::where('userid', '=', $userid)->where('id', '=', $id)->first();
		return view('appmerchant.editsubcat', compact('row' , 'cats' ));
	}

	public function store(Request $request)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$this->validate($request, [
		'name' => 'required' , 'catid' => 'required' 
		]);
		$userid = Auth::id();
		$catid = $request->catid;
		if($request->file('img'))
        {
			$file = $request->file('img');
			$imageName = time().'.'.$request->img->extension(); 	
			$destinationPath = public_path().'/images/subcat/thumb';
			$img = Image::make($file->path());
			$img->resize(180, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath.'/'.$imageName);
			$request->img->move(public_path().'/images/subcat/', $imageName);
        }
		else
		$imageName ='';

		try
		{
			$row =Subcat::create([ 'name' => $request->name ,'userid' => "$userid" ,
			'catid' => "$catid" ,'logo' => $imageName 
			]);
			$row->save();
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
		}
		echo "here ";
		return Redirect::route('viewsubCat.route')->with("message","Thank you for adding");	
	}
	
	public function update(Request $request, $id)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$this->validate($request, [
		'name' => 'required' , 'catid' => 'required' 
		]);
		$userid = Auth::id();	
		if($request->file('img'))
        {
			$file = $request->file('img');
			$imageName = time().'.'.$request->img->extension(); 
			
			$destinationPath = public_path().'/images/subcat/thumb';
			$img = Image::make($file->path());
			$img->resize(180, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath.'/'.$imageName);
			$request->img->move(public_path().'/images/subcat/', $imageName);
        }
		else
		{
			$pic = $request->pic;
			if($pic != "")
				$imageName = $pic;
			else
				$imageName ='';
		}
		$catid = $request->catid;	
		$row =Subcat::where('userid', '=', $userid)->where('id', '=', $id)->first();
		try
		{
			$row->update([
			'name' => $request->name , 'logo' => $imageName ,'catid' => "$catid"
			]);	
			$LastInsertId = $id;
			
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
			echo " message $message ";
		}
		return Redirect::route('viewsubCat.route');
	}	



	public function destroy($id )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$row =Subcat::with(['subsubcatts'])->where('subcats.userid', '=', $userid)->where('subcats.id', '=', $id)->first();
		$row->subsubcatts()->delete();
		$row->delete();
		return Redirect::route('viewsubCat.route');
	}
	
	
	public function destroyall(Request $request )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		if($request->idx && is_array($request->idx))
		{
			foreach($request->idx as $id)
			{
				$row =Subcat::with(['subsubcatts'])->where('subcats.userid', '=', $userid)->where('subcats.id', '=', $id)->first();
				$row->subsubcatts()->delete();
				$row->delete();
			}
		}
		return Redirect::route('viewsubCat.route');
	}
	
	
	
}

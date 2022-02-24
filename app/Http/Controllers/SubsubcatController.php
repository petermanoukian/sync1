<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Cat;
use App\Models\User;
use App\Models\Subcat;
use App\Models\Subsubcat;
use Image;
use DataTables;

class SubsubcatController extends Controller
{
     public function __construct()
    {

    }   
	
	public function getSubsubcatAjax(Request $request)
    {
		
		if($request->subsubcatid != "")
		{
			$subsubcatid = $request->subsubcatid;
		}
		else
		{
			$subsubcatid = '';
		}
		if($request->subcatid != "")
		{
			$userid = Auth::id();
			$html = '<select class="form-control form-control-lg form-control-solid" name = "subsubcatid" id="subsubcatid">
			<option value = "">Choose Subcategory</option>';
			$subcats = Subsubcat::where('subcatid', $request->subcatid)->where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
			$count = count($subcats);
			if($subcats && !empty($subcats) && $count > 0)
			{
				foreach ($subcats as $subcat) 
				{
					if($subsubcatid != "" && $subsubcatid == $subcat->id)
					$html .= '<option value="'.$subcat->id.'" selected>'.$subcat->name.'</option>';
					else
					$html .= '<option value="'.$subcat->id.'">'.$subcat->name.'</option>';
				}
			
				$html .= "</select>";
			}
			else 
			$html = '<select class="form-control form-control-lg form-control-solid" name = "subsubcatid" id="subsubcatid"></select> ';
		}
		else
		$html = 'Choose A Sub sub Category';
    	return response()->json(['html' => $html]);
    }

	public function create($catid='' , $subcatid='')
    {
        $this->middleware(['auth','is_merchant' ,'conf1','conf2']);
		$userid = Auth::id();
		$cats = Cat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subcats = Subcat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		return view('appmerchant/addsubsubcat' , compact('cats' , 'subcats', 'catid' , 'subcatid'));
    }
	
	public function indexadmin(Request $request , $catid='' , $subcatid='')
	{
		$this->middleware(['auth','is_merchant' ,'conf1','conf2']);	
		$sess = session_id();
		$token =  $request->session()->token();	
		$userid = Auth::id();
		
		if ($request->ajax()) {	
			if($catid != "" && $catid != NULL)
			{
				if($subcatid != "" && $subcatid != NULL)
				{
					$data = Subsubcat::with(['cat'])->with(['subcat'])
					->where('subsubcats.userid', '=', $userid)
					->where('subsubcats.catid', '=', $catid)
					->where('subsubcats.subcatid', '=', $subcatid)
					->orderBy('subsubcats.id', 'DESC')->get();
				}
				else
				{
					$data = Subsubcat::with(['cat'])->with(['subcat'])
					->where('subsubcats.userid', '=', $userid)
					->where('subsubcats.catid', '=', $catid)
					->orderBy('subsubcats.id', 'DESC')->get();	
				}	
			}
			else
			{
				$data = Subsubcat::with(['cat'])->with(['subcat'])->where('subsubcats.userid', '=', $userid)
				->orderBy('subsubcats.id', 'DESC')->get();
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
							$subcatname = $row['subcat']['name'];	
							$all = "  $catname  ";
							return $all;
					})
					->addColumn('SubCat', function($row){
							$subcatname = $row['subcat']['name'];	
							return $subcatname;
					})
					
					->addColumn('Image', function($row) use ($token){
     					$id = $row['id'];
						$img = $row['logo'];
						if($img !='')
						{
							$path = asset('/images/subsubcat/thumb/'.$img);	
							$btn2 = " <img src = \"$path\" style = 'max-width:180px;' />";
						}
						else						
							$btn2 = "no picture";
                        return $btn2;
                    })
                    ->addColumn('action', function($row) use ($token){
     					$id = $row['id'];
						$catid = $row['catid'];
						$subcatid = $row['subcatid'];
                        $btn = "
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<form method = 'post' action = \"/appmerchant/subsubcat/delete/$id/\">
							".csrf_field(). method_field('DELETE') ."
							<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
							<input type=\"hidden\" name=\"_token\" value=\"$token\">
							<input type = 'submit' value = 'Delete' 
							onclick='return confirm(\"are you sure you want to remove this item\");'/
							class=\"btn btn-danger\">
							</form>
						</div>
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<a href=\"/appmerchant/editsubsubcat/$id/$catid/$subcatid\" class=\"edit btn btn-primary btn-sm\">Edit </a>
							<a href=\"/appmerchant/addprodbycat/$catid/$subcatid/$id\" class=\"edit btn btn-primary btn-sm\">Add Product </a>
							<a href=\"/appmerchant/viewprodbycat/$catid/$subcatid/$id\" class=\"edit btn btn-primary btn-sm\">Products </a>
						</div>
						";
                        return $btn;
                    })	
					->addColumn('Name', function($row)
					{
						$name = $row['name'];
						return $name;
                    })
					->rawColumns(array("action", "Name" , 'Cat', 'SubCat', 'Delete1' , 'Image'))
                    ->make(true);
        }	
		return view('appmerchant.viewsubsubcat'  , compact( 'catid' , 'subcatid'));
	}
	
	public function edit($id , $catid , $subcatid)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$cats = Cat::where('userid', '=', $userid)->orderBy('name', 'ASC')->get();
		$subcats = Subcat::orderBy('name', 'ASC')->get();
		$row = Subsubcat::where('userid', '=', $userid)->where('id', '=', $id)->first();
		return view('appmerchant.editsubsubcat', compact('row' , 'cats'  , 'subcats'));
	}

	public function store(Request $request)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$this->validate($request, [
		'name' => 'required' , 'catid' => 'required'  , 'subcatid' => 'required'
		]);
		$userid = Auth::id();
		$subcatid = $request->subcatid;
		$catid = $request->catid;
		if($request->file('img'))
        {
			$file = $request->file('img');
			$imageName = time().'.'.$request->img->extension(); 
			
			$destinationPath = public_path().'/images/subsubcat/thumb';
			$img = Image::make($file->path());
			$img->resize(180, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath.'/'.$imageName);
			$request->img->move(public_path().'/images/subsubcat/', $imageName);
        }
		else
		$imageName ='';

		try
		{
			$row =Subsubcat::create([ 'name' => $request->name ,'userid' => "$userid" ,
			'catid' => "$catid" ,'subcatid' => "$subcatid" , 'logo' => $imageName 
			]);
			$row->save();
			//echo " added ";
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
		echo " message $message ";
		}

		return Redirect::route('viewsubsubCat.route')->with("message","Thank you for adding");	
	}
	
	public function update(Request $request, $id)
	{
		
		
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);

		$userid = Auth::id();	
		
		
		if($request->file('img'))
        {
			$file = $request->file('img');
			$imageName = time().'.'.$request->img->extension(); 
			
			$destinationPath = public_path().'/images/subsubcat/thumb';
			$img = Image::make($file->path());
			$img->resize(180, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath.'/'.$imageName);
			$request->img->move(public_path().'/images/subsubcat/', $imageName);
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

		
		$subcatid = $request->subcatid;
		$catid = $request->catid;
		
		$row = Subsubcat::where('userid', '=', $userid)->where('id', '=', $id)->first();
		try
		{
			$row->update([
			'name' => $request->name , 'logo' => $imageName ,
			'catid' => "$catid" ,'subcatid' => "$subcatid"
			]);
			
			$LastInsertId = $id;
		
	
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
			echo " Message $message ";
		}
		return Redirect::route('viewsubsubCat.route');
	}	



	public function destroy($id )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$row =Subsubcat::where('subsubcats.userid', '=', $userid)->where('subsubcats.id', '=', $id)->first();
		$row->delete();
		return Redirect::route('viewsubsubCat.route');
	}
	
	
	public function destroyall(Request $request )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		if($request->idx && is_array($request->idx))
		{
			foreach($request->idx as $id)
			{
				$row = Subsubcat::where('subsubcats.userid', '=', $userid)->where('subsubcats.id', '=', $id)->first();
				$row->delete();
			}
		}
		return Redirect::route('viewsubsubCat.route');
	}
	
	
	
}

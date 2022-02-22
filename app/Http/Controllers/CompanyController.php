<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\User;
use Image;
use DataTables;



class CompanyController extends Controller
{
   
	public function __construct()
    {

    }   
	
	public function create()
    {
        $this->middleware(['auth','is_merchant' ,'conf1','conf2']);
		return view('appmerchant/addcompany');
    }
	
	public function indexadmin(Request $request)
	{
		$this->middleware(['auth','is_merchant' ,'conf1','conf2']);	
		$sess = session_id();
		$token =  $request->session()->token();	
		$userid = Auth::id();
		//echo " userid ::: $userid  ";
		
		if ($request->ajax()) {
            $data = Company::where('userid', '=', $userid)->orderBy('id', 'DESC')->get();
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
							$path = asset('/images/company/thumb/'.$img);	
							$btn2 = " <img src = \"$path\" style = 'max-width:180px;' />";
						}
						else						
							$btn2 = "no picture";
                        return $btn2;
                    })
                    ->addColumn('action', function($row) use ($token){
     					$id = $row['id'];
					
						
						//$count = $row['subcats_count'];
                        $btn = "
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<form method = 'post' action = \"/appmerchant/company/delete/$id/\">
							".csrf_field(). method_field('DELETE') ."
							<input name=\"_method\" type=\"hidden\" value=\"DELETE\">
							<input type=\"hidden\" name=\"_token\" value=\"$token\">
							<input type = 'submit' value = 'Delete' onclick = 'return confirm(\"are you sure you want to remove this item\");'/
							class=\"btn btn-danger\">
							</form>
						</div>
						<div style = 'display:inline;float:left;margin-left:5px;'>
							<a href=\"/appmerchant/editcompany/$id\" class=\"edit btn btn-primary btn-sm\">Edit </a>
							<a href=\"/appmerchant/addsubcompany/$id\" class=\"edit btn btn-primary btn-sm\">Add Subcategory </a>
							<a href=\"/appmerchant/viewsubcompany/$id\" class=\"edit btn btn-primary btn-sm\">Subcategories </a>
							
							<a href=\"/appmerchant/addsubsubcompany/$id\" class=\"edit btn btn-primary btn-sm\">Add Sub Subcategory </a>
							<a href=\"/appmerchant/viewsubsubcompany/$id\" class=\"edit btn btn-primary btn-sm\">Sub Subcategories </a>
							<a href=\"/appmerchant/addprod/$id\" class=\"edit btn btn-primary btn-sm\">Add Product </a>
							<a href=\"/appmerchant/viewprod/$id\" class=\"edit btn btn-primary btn-sm\">Products </a>
							
							
							
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
		
		return view('appmerchant.viewcompany');
	}
	
	public function edit($id)
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();

		$row =Company::where('userid', '=', $userid)->where('id', '=', $id)->first();
		return view('appmerchant.editcompany', compact('row' ));
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
			
			$destinationPath = public_path().'/images/company/thumb';
			$img = Image::make($file->path());
			$img->resize(180, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath.'/'.$imageName);
			$request->img->move(public_path().'/images/company/', $imageName);
			//echo " image name A $imageName " ;
        }
		else
		$imageName ='';

		try
		{
		//name	userid	countryid	catid	conf	realer	branchnum	phone	website	facebook	twiter	insta	prodtypnum	defpublic
			$row =Company::create([ 'name' => $request->name ,'userid' => "$userid" ,
			'logo' => $imageName 
			]);
			$row->save();
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
			//echo "message $message ";
		}
		return Redirect::route('viewCompany.route')->with("message","Thank you for taking this company");	
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
			
			$destinationPath = public_path().'/images/company/thumb';
			$img = Image::make($file->path());
			$img->resize(180, 180, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath.'/'.$imageName);
			$request->img->move(public_path().'/images/company/', $imageName);
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
		
		$row =Company::where('userid', '=', $userid)->where('id', '=', $id)->first();
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
		return Redirect::route('viewCompany.route');
	}	



	public function destroy($id )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		$row =Company::with(['subcompanies'])->
					   with(['subsubcompanies'])->
					   where('companies.userid', '=', $userid)->where('companies.id', '=', $id)->first();
		$row->subsubcompanies()->delete();
		$row->subcompanies()->delete();
		
		$row->delete();
		return Redirect::route('viewCompany.route');
	}
	
	
	public function destroyall(Request $request )
	{
		$this->middleware(['auth','is_merchant' ,'conf','conf2']);
		$userid = Auth::id();
		if($request->idx && is_array($request->idx))
		{
			foreach($request->idx as $id)
			{
				$row = Company::with(['subcompanies'])->
						with(['subsubcompanies'])
				->where('companies.userid', '=', $userid)->where('companies.id', '=', $id)->first();
				$row->subsubcompanies()->delete();
				$row->subcompanies()->delete();
				$row->delete();
			}
		}
		return Redirect::route('viewCompany.route');
	}

}

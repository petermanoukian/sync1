<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Currenc;
use DataTables;

class CurrencController extends Controller
{
    public function __construct()
    {

    }  
	
	public function edit()
	{
		$this->middleware(['auth','is_admin']);
		$userid = Auth::id();

		$row = Currenc::first();
		return view('appadmin.editcur', compact('row' ));
	}
	
	
	public function update(Request $request)
	{

		$this->middleware(['auth','is_admin']);
		$this->validate($request, [
		'name' => 'required' 
		]);

		$row = Currenc::first();
		try
		{
			$row->update([
			'name' => $request->name 
			]);	
			return Redirect::route('CurEdit.route');
		}
		catch (\Exception $e) 
		{
    		$message =  $e->getMessage();
			echo " message $message ";
		}
		
	}	
	
	
	
}

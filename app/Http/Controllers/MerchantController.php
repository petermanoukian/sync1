<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use DB;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use DataTables;

class MerchantController extends Controller
{
    public function _construct()
    {
        $this->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
    }
	
	public function edit()
    {
		$this->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);
		$userid = Auth::id();
		$id = $userid;
		$row =User::find($userid);
		return view('appmerchant.edituser', compact('row'));
	}
	
	
	public function update(Request $request, $id)
	{
		$this->middleware(['auth', 'is_merchant','conf1','conf2' , 'is_merchantnew']);


		$user =User::findOrFail($id);
		
		if($request->password && $request->password != "")
		{
			//echo " HERE 137 ";
			try
			{
				$name = $request->name;
				$email = $request->email;
				$user->update(['name' => $request->name , 'lname' => $request->lname ,
				'email' => $request->email ,
				'password' => Hash::make($request->password)]);	 
			}
			catch (\Exception $e) 
			{
				$message =  $e->getMessage();
			}
		}
		else
		{
			//echo " HERE 153 ";
			try
			{
				$user->update(['name' => $request->name ,  'lname' => $request->lname ,  
				'email' => $request->email ]);
				 
				$name = $request->name;
				$email = $request->email;
			 
			}
			catch (\Exception $e) 
			{
				$message =  $e->getMessage();
			}
		}
		return Redirect::route('viewMerchant.route');
	}
	
	
	
	
	
	
	
	
}

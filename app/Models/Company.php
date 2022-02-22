<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Subcompany;
use App\Models\Subsubcompany;



class Company extends Model
{
    use HasFactory;
	protected $fillable = [ 'userid', 'name','logo' ];
	
	public function user()
    {
        return $this->belongsTo('App\Models\User', 'userid' , 'id');
    }
		
	public function subcompanies()
    {
    	return $this->hasMany('App\Models\Subcompany', 'compid' , 'id' , 'on_delete=models.CASCADE');
	}	
	
	public function subsubcompanies()
    {
    	return $this->hasMany('App\Models\Subsubcompany', 'compid' , 'id' , 'on_delete=models.CASCADE');
	}	
		
}

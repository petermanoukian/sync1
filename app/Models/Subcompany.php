<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Company;
use App\Models\Typesubcompany;
use App\Models\Subsubcompany;
use App\Models\Prod;


class Subcompany extends Model
{
    use HasFactory;
	
	protected $fillable = [ 'userid', 'name', 'compid' , 'typesubcompid' , 'logo'];
	
	public function user()
    {
        return $this->belongsTo('App\Models\User', 'userid' , 'id');
    }
	
	public function company()
    {
        return $this->belongsTo('App\Models\Company', 'compid' , 'id');
    }
	
	public function typesub()
    {
        return $this->belongsTo('App\Models\Typesubcompany', 'typesubcompid' , 'id');
    }
	
	public function subsubbcompanies()
    {
    	return $this->hasMany('App\Models\Subsubcompany', 'subcompid' , 'id' , 'on_delete=models.CASCADE');
	}	
	
	public function prodsubcompanies()
    {
    	return $this->hasMany('App\Models\Prod', 'subcompid' , 'id' , 'on_delete=models.CASCADE');
	}
		
	
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcompany;

class Typesubcompany extends Model
{
    use HasFactory;
	protected $fillable = [ 'name'];
			
	public function subcompanies()
    {
    	return $this->hasMany('App\Models\Subcompany', 'typesubcompid' , 'id' , 'on_delete=models.CASCADE');
	}	
}

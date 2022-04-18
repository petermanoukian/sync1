<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Rolercat;
use App\Models\User;
use App\Models\Roler;
use App\Models\Rolerperm;



class Roler extends Model
{
    use HasFactory;
	protected $fillable = ['name','urlx','des','sectionn','typ','method1','method2','method3','classer'];
	
	public function roleperms()
    {
    	return $this->hasMany('App\Models\Rolerperm', 'rolerid' , 'id' , 'on_delete=models.CASCADE');
	}
}

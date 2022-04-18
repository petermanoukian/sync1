<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Roleruser;
use App\Models\Rolerperm;
use App\Models\Roler;



class Rolercat extends Model
{
    use HasFactory;
	protected $fillable = ['name'];
	
	
	public function rolecatusers()
    {
    	return $this->hasMany('App\Models\Roleruser', 'rolerid' , 'id' , 'on_delete=models.CASCADE');
	}
	public function rolecatperms()
    {
    	return $this->hasMany('App\Models\Rolerperm', 'rolercatid' , 'id' , 'on_delete=models.CASCADE');
	}
	
	
}

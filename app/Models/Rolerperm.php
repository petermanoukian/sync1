<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Rolercat;
use App\Models\User;
use App\Models\Roler;
use App\Models\Roleruser;

class Rolerperm extends Model
{
    use HasFactory;
	
	protected $fillable = ['rolercatid','rolerid'];
	
	
	public function roler()
    {
        return $this->belongsTo('App\Models\Roler', 'rolerid' , 'id');
    }
	
	public function rolercat()
    {
        return $this->belongsTo('App\Models\Rolercat', 'rolercatid' , 'id');
    }
	
	
	
}

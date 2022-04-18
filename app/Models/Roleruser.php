<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Roler;
use App\Models\Rolercat;
use App\Models\Rolerperm;


class Roleruser extends Model
{
    use HasFactory;
	protected $fillable = ['userid','rolerid'];
	
	
	public function user()
    {
        return $this->belongsTo('App\Models\User', 'userid' , 'id');
    }
	
	public function rolercat()
    {
        return $this->belongsTo('App\Models\Rolercat', 'rolerid' , 'id');
    }
	
	
}

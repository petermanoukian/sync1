<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Company;
use App\Models\Subcompany;



class Subsubcompany extends Model
{
    use HasFactory;
	
	protected $fillable = [ 'userid', 'name', 'compid' , 'subcompid' , 'logo'];
	
	public function user()
    {
        return $this->belongsTo('App\Models\User', 'userid' , 'id');
    }
	
	public function company()
    {
        return $this->belongsTo('App\Models\Company', 'compid' , 'id');
    }
	
	public function subcompany()
    {
        return $this->belongsTo('App\Models\Subcompany', 'subcompid' , 'id');
    }
	
	
}

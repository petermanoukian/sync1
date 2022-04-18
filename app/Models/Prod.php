<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Company;
use App\Models\Subcompany;
use App\Models\Subsubcompany;

use App\Models\Cat;
use App\Models\Subcat;
use App\Models\Subsubcat;



class Prod extends Model
{
    use HasFactory;
	
	protected $fillable = ['userid','name','compid','subcompid','subsubcompid','catid','subcatid','subsubcatid','logo','prix','des','dess'];
	
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
	
	public function subsubcompany()
    {
        return $this->belongsTo('App\Models\Subsubcompany', 'subcompid' , 'id');
    }
	
	
	public function cat()
    {
        return $this->belongsTo('App\Models\Cat', 'catid' , 'id');
    }
	
	public function subcat()
    {
        return $this->belongsTo('App\Models\Subcat', 'subcatid' , 'id');
    }
	
	public function subsubcat()
    {
        return $this->belongsTo('App\Models\Subsubcat', 'subcatid' , 'id');
    }
	
	
	
}

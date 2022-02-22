<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Company;
use App\Models\Subcompany;
use App\Models\Subsubcompany;
use App\Models\Typebranch;

class Branch extends Model
{
    use HasFactory;
	
	protected $fillable = [ 'userid','typebranchid','name','compid','subcompid','mobile','phone','address'];
	
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
	
	public function typebranch()
    {
        return $this->belongsTo('App\Models\Typebranch', 'typebranchid' , 'id');
    }
	
	
	
	
}

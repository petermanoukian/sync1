<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Cat;
use App\Models\Subcat;

class Subsubcat extends Model
{
    use HasFactory;
	
	protected $fillable = [ 'userid', 'name', 'catid' , 'subcatid' , 'logo'];
	
	public function user()
    {
        return $this->belongsTo('App\Models\User', 'userid' , 'id');
    }
	
	public function cat()
    {
        return $this->belongsTo('App\Models\Cat', 'catid' , 'id');
    }
	
	public function subcat()
    {
        return $this->belongsTo('App\Models\Subcat', 'subcatid' , 'id');
    }
	
	public function prodsubsubcats()
    {
    	return $this->hasMany('App\Models\Prod', 'subsubcatid' , 'id' , 'on_delete=models.CASCADE');
	}
	
	
	
}

<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Subcat;
use App\Models\Subsubcat;
use App\Models\Discounttcat;

class Cat extends Model
{
    use HasFactory;
	protected $fillable = [ 'userid', 'name','logo' ];
	
	public function user()
    {
        return $this->belongsTo('App\Models\User', 'userid' , 'id');
    }
	
	public function subcats()
    {
    	return $this->hasMany('App\Models\Subcat', 'catid' , 'id' , 'on_delete=models.CASCADE');
	}
	
	public function subsubcats()
    {
    	return $this->hasMany('App\Models\Subsubcat', 'catid' , 'id' , 'on_delete=models.CASCADE');
	}
	
	public function prodcats()
    {
    	return $this->hasMany('App\Models\Prod', 'catid' , 'id' , 'on_delete=models.CASCADE');
	}
		
	public function catdiscs()
    {
        return $this->hasMany('App\Models\Discounttcat', 'catid' , 'id' , 'on_delete=models.CASCADE');
    }
	
	
	
	
}

<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Subcat;
use App\Models\Subsubcat;

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
	
}

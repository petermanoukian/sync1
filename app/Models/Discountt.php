<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Discounttcat;

class Discountt extends Model
{
    use HasFactory;
	protected $fillable = [ 'name' , 'perc'];
	
	
	public function disccats()
    {
        return $this->hasMany('App\Models\Discounttcat', 'discid' , 'id' , 'on_delete=models.CASCADE');
    }
	
	
	
}

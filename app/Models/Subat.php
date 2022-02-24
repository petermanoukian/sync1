<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Cat;


class Subat extends Model
{
    use HasFactory;
	
	protected $fillable = [ 'userid', 'name', 'catid' ,  'logo'];
	
	public function user()
    {
        return $this->belongsTo('App\Models\User', 'userid' , 'id');
    }
	
	public function cat()
    {
        return $this->belongsTo('App\Models\Cat', 'catid' , 'id');
    }
	
	
	
}

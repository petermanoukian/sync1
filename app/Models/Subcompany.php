<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Company;
use App\Models\Typesubcompany;




class Subcompany extends Model
{
    use HasFactory;
	
	protected $fillable = [ 'userid', 'name', 'compid' , 'typesubcompid' , 'logo'];
	
	public function user()
    {
        return $this->belongsTo('App\Models\User', 'userid' , 'id');
    }
	
	public function company()
    {
        return $this->belongsTo('App\Models\Company', 'compid' , 'id');
    }
	
	public function typesub()
    {
        return $this->belongsTo('App\Models\Typesubcompany', 'typesubcompid' , 'id');
    }
	
	
	
}

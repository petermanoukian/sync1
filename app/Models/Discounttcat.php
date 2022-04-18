<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Discountt;
use App\Models\Cat;



class Discounttcat extends Model
{
    use HasFactory;
	protected $table = 'disccats';
	protected $fillable = ['name', 'discid','catid' ];
	
	public function cat()
    {
        return $this->belongsTo('App\Models\Cat', 'catid' , 'id');
    }
	
	public function disc()
    {
        return $this->belongsTo('App\Models\Discountt', 'discid' , 'id');
    }
	
	
	
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discountt extends Model
{
    use HasFactory;
	protected $fillable = [ 'name' , 'perc'];
}

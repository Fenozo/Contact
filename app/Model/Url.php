<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
	protected $guarded = ['id','created_at'];
	
    // protected $fillable = ['usrls', 'shortened'];
}

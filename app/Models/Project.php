<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];

    public function todos ()
    {
    	return $this->hasMany('App\Models\Todo', 'project_id', 'id');
    }
}

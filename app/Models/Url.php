<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $dates = ['created_at', 'updated_at'];

	protected $guarded = ['id'];
    
    public function getCreatedAt() 
    {
        if ($this->created_at == null)
        {
            $this->created_at = new \Carbon\Carbon();
        }
        return $this->created_at;
    }

    public function documentations () 
    {
        return $this->hasMany('App\Models\Documentation', 'url_id', 'id');
    }
    
    // protected $fillable = ['usrls', 'shortened'];
}

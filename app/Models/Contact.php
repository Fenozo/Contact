<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $filable = [
        'pays',
        'ville',
        'email',
        'telephone',
        'adresse'
    ];

    public function personne ()
    {
        return $this->belongsTo('App\Models\Personne');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    public const PREFIX = 'personne';
    public const FOREINGKEY = 'personne_id';

    protected $filable = array(
        'name',
        'prename',
        'date_naissance',
        'lieu_naissance',
        'cin',
        'date_livraison_cin'
    );

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact', self::FOREINGKEY, 'id');
    }

    public function getPrename()
    {
        return $this->prename;
    }
}

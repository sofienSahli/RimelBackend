<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circuit extends Model
{
    protected $fillable = [
        'description', 'difficulty', 'duree', 'title'
    ];

    public function spots()
    {
        return $this->hasMany('App\Spot');
    }
}

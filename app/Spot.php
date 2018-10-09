<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $fillable = [
        'description','image', 'latitude', 'longitude','circuit_id'
    ];
    public function circuit(){
        return $this->belongsTo('App\Circuit');
    }
    /**
     * Set the post's image.
     *
     * @param  string  $value
     * @return void
     */
    public function setImagePath($value)
    {
        $this->attributes['image'] = strtolower($value);
    }

}

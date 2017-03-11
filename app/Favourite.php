<?php

namespace Umbrellapp;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $table = 'favourites';

    protected $fillable = [
        'id', 'city_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'city_id'
    ];

    public function city()
    {
        return $this->belongsTo('Umbrellapp\City', 'city_id', 'id');
    }
}

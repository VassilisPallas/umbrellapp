<?php

namespace Umbrellapp;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $table = 'weather';

    protected $fillable = [
        'id', 'main', 'description', 'icon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}

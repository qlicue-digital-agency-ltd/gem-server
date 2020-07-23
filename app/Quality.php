<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quality extends Model
{
    protected $fillable = [
        'id',
        'race',
        'tribe',
        'religion',
        'hobby',
        'height',
        'color',
        'education',
        'job',
        'body',
    ];

    protected $hidden = [

    ];

    protected $casts = [
    ];
}

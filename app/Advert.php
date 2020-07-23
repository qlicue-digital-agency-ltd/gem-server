<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advert extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'link',
        'desc',
        'image',
    ];

    protected $dates = ['deleted_at'];

    
}

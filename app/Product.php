<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'desc', 'price', 'image','user_id','status'
    ];
    protected $dates = ['deleted_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'address',
        'logo',
        'phone',
        'email',
    ];

    protected $dates = ['deleted_at'];


    public function jobs()
    {
        return $this->hasMany(Job::class)->orderBy('created_at', 'desc');
    }
}

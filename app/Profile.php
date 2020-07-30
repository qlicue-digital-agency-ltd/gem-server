<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'avatar',
        'first_name',
        'last_name',
        'sex',
        'birthday',
        'user_id',
        'marital_status',
        'nationality', 'dominion',
        'education',
        'profession',
        'pronvice',
        'height',
        'skin_color',
        'education_id',
        'profession_id',
        'bio'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

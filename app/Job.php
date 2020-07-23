<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'company_id',
        'title',
        'desc',
        'deadline',
    ];

    protected $dates = ['deleted_at'];

    public function companies()
    {
        return $this->belongsTo(Company::class);
    }

    public function descriptions()
    {
        return $this->hasMany(Description::class)->orderBy('created_at', 'desc');
    }
    public function qualifications()
    {
        return $this->hasMany(Qualification::class)->orderBy('created_at', 'desc');
    }
}

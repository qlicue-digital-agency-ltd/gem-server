<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qualification extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'job_id',
        'desc',
    ];

    protected $dates = ['deleted_at'];

    public function jobs()
    {
        return $this->belongsTo(Job::class);
    }
}

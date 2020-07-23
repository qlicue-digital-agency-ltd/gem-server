<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{

    public function paragraphgable()
    {
        return $this->morphTo();
    }


    public function advert()
    {
        return $this->belongsTo(Advert::class, 'advert_id');
    }
}

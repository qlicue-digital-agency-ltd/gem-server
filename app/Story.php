<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'slug', 'image'
    ];
    protected $dates = ['deleted_at'];

    public function paragraphs()
    {
        return $this->morphMany(Paragraph::class, 'paragraphable');
    }
}

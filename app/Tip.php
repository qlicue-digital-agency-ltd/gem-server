<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tip extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'slug', 'image', 'subtitle'
    ];
    protected $dates = ['deleted_at'];


    public function paragraphs()
    {
        return $this->morphMany(Paragraph::class, 'paragraphable');
    }
}

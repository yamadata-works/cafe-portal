<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'type'];

    // このタグは、たくさんのカフェにつく
    public function cafes()
    {
        return $this->belongsToMany(Cafe::class);
    }
}

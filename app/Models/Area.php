<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name'];

    // このエリアには、たくさんのカフェがある
    public function cafes()
    {
        return $this->hasMany(Cafe::class);
    }
}

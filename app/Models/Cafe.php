<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;
    // このカフェは、1 つのエリアに属する
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    // このカフェには、たくさんのタグがつく
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}

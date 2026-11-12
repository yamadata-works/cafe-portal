<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;

    // 登録・更新で、入れていい列の許可リスト
    protected $fillable = [
        'name',
        'area_id',
        'address',
        'open_hours',
        'budget',
        'seats',
        'description',
        'image_path',
    ];

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

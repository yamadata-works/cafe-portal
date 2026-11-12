<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            // 雰囲気
            ['name' => '静か', 'type' => '雰囲気'],
            ['name' => 'レトロ', 'type' => '雰囲気'],
            ['name' => 'おしゃれ', 'type' => '雰囲気'],
            ['name' => '一人でも入りやすい', 'type' => '雰囲気'],
            // 設備
            ['name' => '電源あり', 'type' => '設備'],
            ['name' => 'Wi-Fiあり', 'type' => '設備'],
            ['name' => 'テラス席', 'type' => '設備'],
            ['name' => '禁煙', 'type' => '設備'],
            // メニュー
            ['name' => 'セット', 'type' => 'メニュー'],
            ['name' => 'モーニング', 'type' => 'メニュー'],
            ['name' => '自家焙煎', 'type' => 'メニュー'],
            ['name' => '手作りケーキ', 'type' => 'メニュー'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => '静か', 'type' => '雰囲気'],
            ['name' => '電源あり', 'type' => '設備'],
            ['name' => 'セット', 'type' => 'サービス'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}

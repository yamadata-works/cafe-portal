<?php

namespace Database\Factories;

use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;

class CafeFactory extends Factory
{
    public function definition(): array
    {
        // エリアを1つ選ぶ
        $area = Area::inRandomOrder()->first();

        // エリアごとの住所（エリアと住所がずれないように）
        $addresses = [
            '下北沢' => '東京都世田谷区北沢',
            '渋谷' => '東京都渋谷区神南',
            '自由が丘' => '東京都目黒区自由が丘',
            '吉祥寺' => '東京都武蔵野市吉祥寺本町',
            '中目黒' => '東京都目黒区上目黒',
        ];

        // 店名の前半と後半を組み合わせて、名前を作る
        $first = ['ことり', '木漏れ日', 'ひなた', '月灯り', 'しずく', 'あおぞら', 'ふくろう', 'まどろみ', 'くじら', 'ほたる',
            'つばめ', 'やまねこ', 'そよかぜ', 'たんぽぽ', 'みずうみ', 'あかね', 'こけもも', 'ゆうなぎ', 'はるいろ', 'よつば'];
        $last = ['珈琲', 'コーヒー', '喫茶', 'カフェ', '珈琲店', '珈琲舎', '茶房', 'ベーカリーカフェ'];

        $names = [];
        foreach ($first as $f) {
            foreach ($last as $l) {
                $names[] = $f.$l;
            }
        }

        return [
            'name' => fake()->unique()->randomElement($names),
            'area_id' => $area->id,
            'address' => $addresses[$area->name].fake()->numberBetween(1, 5).'-'.fake()->numberBetween(1, 20).'-'.fake()->numberBetween(1, 15),
            'open_hours' => fake()->randomElement(['7:30〜17:00', '8:00〜18:00', '9:00〜19:00', '10:00〜20:00', '11:00〜22:00']),
            'budget' => fake()->numberBetween(5, 20) * 100,
            'seats' => fake()->numberBetween(8, 40),
            'description' => fake()->randomElement([
                '落ち着いた雰囲気のカフェです。',
                '自家焙煎のコーヒーが自慢の小さなお店です。',
                '手作りのケーキと焼き菓子が人気です。',
                '窓辺の席から季節の景色が楽しめます。',
                '一人でもゆっくり過ごせるカウンター席があります。',
                '古い家具に囲まれた、レトロな喫茶店です。',
                'モーニングのトーストセットが評判です。',
                '本を読みながら長居できる、静かなお店です。',
            ]),
            'image_path' => null,
        ];
    }
}

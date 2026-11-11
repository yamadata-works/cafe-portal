<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Cafe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cafe>
 */
class CafeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['木漏れ日', '月灯り', '珈琲堂', 'ひなた']),
            'address' => fake()->randomElement(['東京都世田谷区代沢2-1-1', '東京都渋谷区神南1-2-3']),
            'open_hours' => fake()->randomElement(['9:00〜18:00', '10:00〜20:00']),
            'budget' => fake()->numberBetween(500, 2000),
            'seats' => fake()->numberBetween(6, 30),
            'description' => fake()->randomElement(['落ち着いた雰囲気のカフェです。', '自家焙煎のコーヒーが人気です。']),
            'image_path' => null,
            'area_id' => Area::inRandomOrder()->first()->id,
        ];
    }
}

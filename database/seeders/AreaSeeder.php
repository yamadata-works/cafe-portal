<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['下北沢', '渋谷', '自由が丘', '吉祥寺', '中目黒'];

        foreach ($names as $name) {
            Area::create(['name' => $name]);
        }
    }
}

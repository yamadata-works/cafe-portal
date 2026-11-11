<?php

namespace Database\Seeders;

use App\Models\Cafe;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class CafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cafe::factory()->count(30)->create();
        foreach (Cafe::all() as $cafe) {
            $cafe->tags()->attach(Tag::inRandomOrder()->take(2)->pluck('id'));
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 4; $i++) {
            $title=$faker->sentence(6);
            Article::create([
                'category_id' => rand(1, 7),
                'title' => $title, 
                'image' => $faker->imageUrl(800, 400, 'cats', true, 'Faker'),
                'content' => $faker->paragraph,
                'slug' => Str::slug($title),
                'created_at' => $faker->dateTime('now'),
                'updated_at' => now()
            ]);
        }

    }
}

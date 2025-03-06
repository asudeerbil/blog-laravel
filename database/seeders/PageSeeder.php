<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'title' => 'Albert Einstein: "Imagination is more important than knowledge"',
            'image' => 'https://lemonacademy.co.uk/wp-content/uploads/2022/02/Albert-Einstein-1200x675.jpg',  // Resim URL'si
            'content' => 'Albert Einstein always emphasized the power of imagination. For him, science was a path followed by imagination. "Imagination is more important than knowledge" encourages people to develop creative ideas that go beyond boundaries.',
            'slug' => Str::slug('Albert Einstein: "Imagination is more important than knowledge"'),
            'order' => 1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        Page::create([
            'title' => 'Marie Curie: "Life is really simple, but we insist on making it complicated"',
            'image' => 'https://hips.hearstapps.com/hmg-prod/images/marie-curie.jpg',  // Resim URL'si
            'content' => 'Marie Curie, who revolutionized the world of science, believed that life’s complexity could often be simplified. "Life is really simple, but we insist on making it complicated" reflects her perspective on how we sometimes complicate things unnecessarily.',
            'slug' => Str::slug('Marie Curie: "Life is really simple, but we insist on making it complicated"'),
            'order' => 2,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        Page::create([
            'title' => 'Isaac Newton: "If I have seen further it is by standing on the shoulders of Giants"',
            'image' => 'https://cdn.mos.cms.futurecdn.net/3buDqF4oZrEByNRVBgYwmm-1200-80.jpg',  // Resim URL'si
            'content' => 'Isaac Newton’s famous quote "If I have seen further it is by standing on the shoulders of Giants" refers to how scientific discoveries are often built upon the knowledge of those before us. Newton acknowledged the contributions of previous scholars to his own work.',
            'slug' => Str::slug('Isaac Newton: "If I have seen further it is by standing on the shoulders of Giants"'),
            'order' => 3,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        
    }
}

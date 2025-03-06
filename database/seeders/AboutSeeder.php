<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'name' => 'Asude Erbil',
            'content' => 'Hello, I am Asude Erbil. I was born in Denizli, and I am currently a senior student in 
            Computer Engineering at Mersin University. Throughout my education, my interest in software has grown, 
            and now I am doing my final internship at Eterna Technology. During my internship, I am focusing on working 
            with the backend of web applications to further develop my skills in this field. My family lives in London, England. 
            I travel to London during the summer and on some holidays. While in London, I attended a language course, but 
            another way I improve my English is by practicing speaking in English at work and in daily life. I aim to progress in the software world, gaining both technical knowledge and international experience.',
            'image' => 'https://img.freepik.com/premium-photo/social-media-networking-network-connection-smartphone-tablet-computer-keyboard-mouse_220873-5882.jpg?w=1380',
            'slug' => Str::slug('Asude Erbil'),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}

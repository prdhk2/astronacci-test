<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        // Free articles
        for ($i = 1; $i <= 12; $i++) {
            Article::create([
                'title'        => "Free Article {$i}",
                'slug'         => Str::slug("Free Article {$i}"),
                'excerpt'      => "Ini ringkasan artikel gratis ke-{$i}",
                'content'      => "Konten lengkap artikel gratis ke-{$i}. Lorem ipsum dolor sit amet.",
                'is_premium'   => false,
                'published_at' => now(),
            ]);
        }

        // Premium articles
        for ($i = 1; $i <= 8; $i++) {
            Article::create([
                'title'        => "Premium Article {$i}",
                'slug'         => Str::slug("Premium Article {$i}"),
                'excerpt'      => "Ini ringkasan artikel premium ke-{$i}",
                'content'      => "Konten eksklusif premium artikel ke-{$i}.",
                'is_premium'   => true,
                'published_at' => now(),
            ]);
        }
    }
}


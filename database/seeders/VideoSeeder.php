<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        // Free videos
        for ($i = 1; $i <= 12; $i++) {
            Video::create([
                'title'        => "Free Video {$i}",
                'slug'         => Str::slug("Free Video {$i}"),
                'video_url'    => "https://www.youtube.com/watch?v=dQw4w9WgXcQ",
                'description'  => "Video gratis ke-{$i}",
                'is_premium'   => false,
                'published_at' => now(),
            ]);
        }

        // Premium videos
        for ($i = 1; $i <= 8; $i++) {
            Video::create([
                'title'        => "Premium Video {$i}",
                'slug'         => Str::slug("Premium Video {$i}"),
                'video_url'    => "https://www.youtube.com/watch?v=dQw4w9WgXcQ",
                'description'  => "Video premium eksklusif ke-{$i}",
                'is_premium'   => true,
                'published_at' => now(),
            ]);
        }
    }
}


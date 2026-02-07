<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::insert([
            [
                'name' => 'Basic',
                'code' => 'A',
                'article_limit' => 3,
                'video_limit' => 3,
            ],
            [
                'name' => 'Standard',
                'code' => 'B',
                'article_limit' => 10,
                'video_limit' => 10,
            ],
            [
                'name' => 'Premium',
                'code' => 'C',
                'article_limit' => null,
                'video_limit' => null,
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        for ($i = 0; $i < 30; $i++) {
            $user = User::inRandomOrder()->first();
            Post::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}

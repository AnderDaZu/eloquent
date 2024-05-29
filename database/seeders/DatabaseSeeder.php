<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Category;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(100)->create()->each(function ($user) {
            Profile::factory(1)->create([
                'user_id' => $user->id
            ])->each(function ($profile) {
                Address::factory(1)->create([
                    'profile_id' => $profile->id
                ]);
            });
        });

        Category::factory(10)->create();

        Post::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

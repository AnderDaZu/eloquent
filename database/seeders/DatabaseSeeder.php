<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Section;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);

        Category::factory(10)->create();

        $this->call([
            PostSeeder::class,
            CourseSeeder::class,
        ]);
        // lo de ☝️ es igual a 👇
        // $this->call(PostSeeder::class);
        // $this->call(CourseSeeder::class);

        Tag::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

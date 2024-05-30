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

        Course::factory(20)->create()->each(function ($course) {
            Section::factory(3)->create([
                'course_id' => $course->id
            ])->each(function ($section) {
                Lesson::factory(2)->create([
                    'section_id' => $section->id
                ]);
            });
        });

        Tag::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

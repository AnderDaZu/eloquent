<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
    }
}

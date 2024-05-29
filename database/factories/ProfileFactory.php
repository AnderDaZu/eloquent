<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job' => fake()->jobTitle(),
            'phone' => fake()->phoneNumber(),
            'website' => fake()->domainName(),
            'address' => fake()->address(),
            'city' => fake()->city(),
            'country' => fake()->country()
        ];
    }
}

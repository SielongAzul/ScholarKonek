<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ScholarshipApplication>
 */
class ScholarshipApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'graduated_at' => fake()->city,
            'schoolyear_start' => fake()->date('Y'),
            'schoolyear_finish' => fake()->date('Y'),
            'grade' => fake()->randomFloat(2, 0, 100),
            'age'=> fake()->numberBetween(18,50),
            'address' => fake()->city,
            'contactnumber' => fake()->phoneNumber,
            'emailadd' => fake()->unique()->safeEmail,

        ];
    }
}

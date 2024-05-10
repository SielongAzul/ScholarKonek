<?php

namespace Database\Factories;

use App\Models\Scholarship;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scholarship>
 */
class ScholarshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraphs(3, true),
            'schoolname'=> fake()->streetName(),
            'requirements' => fake()->paragraphs(3, true),
            'location' => fake()->city,
            'category' => fake()->randomElement(Scholarship::$category),
            'contactno' => fake()->phoneNumber(),
            'grants' => fake()->randomElement(Scholarship::$grants),
            'grade_needed' => fake()->numberBetween(50, 100),
            'monetary_value' => fake()->numberBetween(10_000, 100_000),
        ];
    }
}

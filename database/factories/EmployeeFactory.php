<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'image' => 'https://placehold.co/300x300?text=Employee',





            'description' => fake()->optional()->realText(100),
            'hire_date' => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
        ];
    }
}

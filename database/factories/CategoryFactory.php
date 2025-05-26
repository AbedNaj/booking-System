<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Hair Services',
                'Massage',
                'Fitness & Training',
                'Beauty & Skin Care',
                'Nails & Spa',
                'Medical Services',
                'Consultation',
            ]),
            'description' => fake()->realText(100),
        ];
    }
}

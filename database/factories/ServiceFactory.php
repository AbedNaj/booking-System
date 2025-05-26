<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
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
                'Haircut',
                'Massage',
                'Personal Training',
                'Beard Trim',
                'Facial Treatment',
                'Hair Coloring',
                'Yoga Session',
                'Nail Care'
            ]),
            'description' => fake()->realText(100),
            'price' => fake()->randomFloat(2, 10, 250),
            'duration_minutes' => fake()->randomElement([15, 30, 45, 60, 90]),
            'image' => 'https://placehold.co/640x480?text=Service',



        ];
    }
}

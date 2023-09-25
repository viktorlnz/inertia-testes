<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Events>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Event ' . fake()->name(),
            'description' => fake()->text(800),
            'starts_at' => fake()->dateTimeBetween('-2 months','2024-12-30T00:00:00'),
            'duration_time' => fake()->numberBetween(20, 1200)
        ];
    }
}

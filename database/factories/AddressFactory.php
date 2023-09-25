<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        

        return [
            'address' => fake()->streetAddress(),
            'neighborhood' => fake()->address(),
            'city' => fake()->city(),
            'uf' => fake()->randomElement(range('A', 'Z')) . fake()->randomElement(range('A', 'Z')),
            'number' => fake()->numberBetween(1, 10000),
            'zip_code' => fake()->numerify('########')
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

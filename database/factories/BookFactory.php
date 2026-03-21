<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => $this->faker->unique()->numerify('B-####'),
            'title' => fake()->sentence(3),
            'genre' => fake()->randomElement(['Sci-fi', 'Romance', 'Mystery', 'Fantasy', 'Action']),
            'is_available' => fake()->boolean(),
        ];
    }
}

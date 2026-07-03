<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $сolors = ['red', 'orange', 'yellow', 'green', 'cyan', 'blue', 'purple', 'pink'];

        return [
            'name'       => fake()->unique()->word(),
            'color_name' => fake()->randomElement($сolors)
        ];
    }
}

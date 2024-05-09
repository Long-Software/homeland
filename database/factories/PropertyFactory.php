<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'price' => $this->faker->name(),
            'img_url' => 'hero_bg_2.jpg',
            'beds' => $this->faker->name(),
            'baths' => $this->faker->name(),
            'sqaure_foot' => $this->faker->name(),
            'length' => $this->faker->name(),
            'house_type' => $this->faker->name(),
            'year_built' => $this->faker->name(),
            'price_per_square' => $this->faker->name(),
            'info' => $this->faker->name(),
            'address' => $this->faker->name(),
            'agent_name' => $this->faker->name(),
            'type' => $this->faker->name(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Property;
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
            'price' => $this->faker->randomFloat(2,0,100000),
            'img_url' => 'hero_bg_2.jpg',
            'beds' => $this->faker->numberBetween(1,10),
            'baths' => $this->faker->numberBetween(1,10),
            'sqaure_foot' => $this->faker->name(),
            'length' => $this->faker->name(),
            'house_type' => $this->faker->randomElement(Property::HOUSE_TYPE),
            'year_built' => $this->faker->name(),
            'price_per_square' => $this->faker->name(),
            'info' => $this->faker->name(),
            'address' => $this->faker->name(),
            'agent_name' => $this->faker->name(),
            'type' => $this->faker->randomElement(Property::TYPE),
        ];
    }
}

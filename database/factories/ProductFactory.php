<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'category_id' => $this->faker->numberBetween(1, 3),
            'name' => $this->faker->word(),
            'image' => "http://127.0.0.1:8000/images/img.jpg",
            'description' => $this->faker->sentence(15),
            'price' => $this->faker->numberBetween(1000, 100000),
        ];
    }
}

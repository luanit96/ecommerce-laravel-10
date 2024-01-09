<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'images' => $this->faker->name . '.png',
            'link' => 'https://google.com',
            'description' => $this->faker->text
        ];
    }
}

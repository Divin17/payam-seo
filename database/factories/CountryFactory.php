<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $name = $this->faker->country(),
            'priority' => $this->faker->randomDigit(),
            'slug' => str_slug($name),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence($nbWords=20),
            'flag' => $this->faker->imageUrl($width = 40, $height = 20),
            'status' => 1,
            'currency' => $this->faker->currencyCode(),
            // 'setup_caption' => $this->faker->sentence(),
            // 'setup_steps' => json_encode(array()),
            'value_propositions' => json_encode(array()),
        ];
    }
}

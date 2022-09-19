<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "icon" => $this->faker->imageUrl($width = 40, $height = 20),
            "name" => $name = $this->faker->sentence(),
            "description" => $this->faker->sentence($nbWords = 13, $variableNbSentences = true),
            "status" => 1,
            "value_propositions" => json_encode(array()),
            'slug' => str_slug($name),
            'caption' => $this->faker->sentence($nbWords = 20),
            'caption_image' => $this->faker->imageUrl($width = 240, $height = 160),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $name = $this->faker->name(),
            "description" => $this->faker->sentence($nbWords = 10, $variableNbSentences = true),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'status' => 1,
            'setup_caption' => $this->faker->sentence(),
            'setup_steps' => json_encode(array()),
            'slug' => str_slug($name),
            "value_propositions" => json_encode(array()),
            'caption' => $this->faker->sentence($nbWords = 20),
            'caption_image' => $this->faker->imageUrl($width = 240, $height = 160),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $name = $this->faker->company,
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'status' => 1,
            'caption' => $this->faker->sentence(),
            'caption_image' => $this->faker->imageUrl($width = 640, $height = 480),
            'setup_caption' => $this->faker->sentence(),
            'setup_steps' => json_encode(array()),
            'value_propositions' => json_encode(array()),
            'slug' => str_slug($name)
        ];
    }
}

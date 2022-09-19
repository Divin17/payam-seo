<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryUserTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "country_id" => Country::inRandomOrder()->first()->id,
            "name" => $name = $this->faker->sentence($nbWords = 3, $variableNbSentences = true),
            "description" => $this->faker->sentence($nbWords = 10, $variableNbSentences = true),
            'icon' => $this->faker->imageUrl($width = 640, $height = 480),
            'status' => 1,
            'caption' => $this->faker->sentence($nbWords = 20),
            'caption_image' => $this->faker->imageUrl($width = 240, $height = 160),
            'setup_caption' => $this->faker->sentence(),
            "value_propositions" => json_encode(array()),
            'setup_steps' => json_encode(array()),
            'slug' => str_slug($name)
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\CountryUserType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryUserTypeProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country_id' => Country::inRandomOrder()->first()->id,
            'usertype_id' => CountryUserType::inRandomOrder()->first()->id,
            'name' => $name = $this->faker->company,
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'caption_image' => $this->faker->imageUrl($width = 640, $height = 480),
            'status' => 1,
            'caption' => $this->faker->sentence(),
            'setup_caption' => $this->faker->sentence(),
            'setup_steps' => json_encode(array()),
            'value_propositions' => json_encode(array()),
            'slug' => str_slug($name)
        ];
    }
}

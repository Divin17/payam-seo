<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryProviderServiceFactory extends Factory
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
            "provider_id" => Provider::inRandomOrder()->first()->id,
            "icon" => $this->faker->imageUrl($width = 40, $height = 20),
            "title" => $title = $this->faker->sentence(),
            "description" => $this->faker->sentence($nbWords = 13, $variableNbSentences = true),
            'slug' => str_slug($title),
            "status" => 1,
        ];
    }
}

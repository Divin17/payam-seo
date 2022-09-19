<?php

namespace Database\Seeders;

use Faker\Generator;
use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PragmaRX\Countries\Package\Countries;

class countriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $countries = new Countries();
        // $faker = new Generator();
        // foreach ($countries->all() as $country) {
        //     Country::create([
        //         'name' => $country->name->common,
        //         'flag' => $country->flag->emoji ?? '',
        //         'currency' => $country->currencies[0] ?? '',
        //         'title' => $faker->sentence($nbWords=12),
        //         'description' => $faker->paragraph(),
        //         "value_propositions" => json_encode(array()),
        //         "status" => 1
        //     ]);
        // }
    }
}

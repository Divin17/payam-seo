<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class countrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                "name" => "Rwanda",
                "slug" => "rwanda",
                "flag" => \public_path() . "images/countries/flags/RW.png",
            ],
            [
                "name" => "Cameroon",
                "slug" => "cameroon",
                "flag" => \public_path() . "images/countries/flags/CM.png",
            ]
        ]);
    }
}

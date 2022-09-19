<?php

namespace Database\Seeders;

use App\Models\Provider;
use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class providersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert([
            [
                "name" => "MTN",
                "slug" => "mtn",
            ],
            [
                "name" => "Airtel",
                "slug" => "airtel",
            ],
            [
                "name" => "Orange",
                "slug" => "orange",
            ]
        ]);
    }
}

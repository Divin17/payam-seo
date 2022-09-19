<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class usertypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            [
                "name" => "Individual",
                "slug" => "individual",
            ],
            [
                "name" => "Agents",
                "slug" => "agents",
            ],
            [
                "name" => "Merchants",
                "slug" => "merchants",
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class servicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                "title" => "Send Money",
                "slug" => "send-money",
            ],
            [
                "title" => "Momo Pay",
                "slug" => "momo-pay",
            ],
            [
                "title" => "Buy internet bundles",
                "slug" => "buy-internet-bundles",
            ],
        ]);
    }
}

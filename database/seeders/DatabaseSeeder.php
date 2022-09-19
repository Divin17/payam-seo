<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\CountryNetwork;
use App\Models\CountryProvider;
use App\Models\CountryProviderService;
use App\Models\CountryUserType;
use App\Models\CountryUserTypeProvider;
use App\Models\Network;
use App\Models\Provider;
use App\Models\Service;
use App\Models\UserType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UsersSeeder::class);

        // Country::factory(3)->create();
        // Provider::factory(5)->create();
        // Service::factory(5)->create();
        // UserType::factory(3)->create();
        // CountryProvider::factory(5)->create();
        // CountryUserType::factory(3)->create();
        // CountryProviderService::factory(4)->create();
        // $this->call(countrySeeder::class);
        // $this->call(providersSeeder::class);
        // $this->call(servicesSeeder::class);
        // $this->call(usertypesSeeder::class);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // Create a Country
       $country = Country::create(['name' => 'India']);

       // Create a State
       $state = State::create(['name' => 'Maharashtra', 'country_id' => $country->id]);

       // Create a City
       $city = City::create(['name' => 'Pune', 'state_id' => $state->id]);

       // Create a User
       User::create([
           'name' => 'Muzaffar Shaikh',
           'email' => 'muzaffar@example.com',
           'country_id' => $country->id,
           'state_id' => $state->id,
           'city_id' => $city->id
       ]);
    }
}

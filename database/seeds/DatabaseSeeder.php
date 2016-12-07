<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AirportsTableSeeder::class);
        $this->call(FuelTableSeeder::class);
        $this->call(ManufacturerTableSeeder::class);
        $this->call(AirplanesTableSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Manufacturer;

class ManufacturerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Manufacturer())->create(['name' => 'Embraer']);
    }
}

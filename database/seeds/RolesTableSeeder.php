<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

/**
 * Class RolesTableSeeder
 */
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['user', 'admin'] as $name)
            (new Role)->create(compact('name'));

    }
}

<?php

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(User::class, 10)->create()->each(function ($user) {
            $user->roles()->attach(1);
        });

        $data = [
            2 => [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => '123456'
            ],
            1 => [
                'name' => 'user',
                'email' => 'user@user.com',
                'password' => '123456'
            ]
        ];

        foreach ($data as $role => $data)
            (new User())->create($data)->roles()->attach($role);
    }
}

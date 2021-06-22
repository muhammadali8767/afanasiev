<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Administrator',
                'email' => 'admin@g.g',
                'password' => bcrypt('12345678'),
                'role_id' => 1,
            ],
            [
                'name' => 'Moderator',
                'email' => 'moderator@g.g',
                'password' => bcrypt('12345678'),
                'role_id' => 2,
            ],
            [
                'name' => 'Editor',
                'email' => 'editor@g.g',
                'password' => bcrypt('12345678'),
                'role_id' => 3,
            ],
            [
                'name' => 'User',
                'email' => 'user@g.g',
                'password' => bcrypt('12345678'),
                'role_id' => 4,
            ],
        ];

        \DB::table('users')->insert($data);

    }
}

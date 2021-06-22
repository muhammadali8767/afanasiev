<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
                'role' => 'admin'
            ],
            [
                'role' => 'moderator'
            ],
            [
                'role' => 'editor'
            ],
            [
                'role' => 'user'
            ],
        ];

        \DB::table('roles')->insert($data);

    }
}

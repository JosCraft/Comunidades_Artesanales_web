<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\UserRol;

class CreateRolUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesUsers = [
            [
                'role_id' => 4,
                'user_id' => 5,
            ],
            [
                'role_id' => 5,
                'user_id' => 6,
            ],
            [
                'role_id' => 6,
                'user_id' => 7,
            ],
            [
                'role_id' => 2,
                'user_id' => 3,
            ],
        ];
        foreach ($rolesUsers as $key => $roleUser) {
            UserRol::create($roleUser);
        }
    }
}

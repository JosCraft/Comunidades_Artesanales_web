<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;

class CreateRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'User',
                'slug' => 'user',
            ],
            [
                'name' => 'Comunario',
                'slug' => 'comunario',
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
            ],
            [
                'name' => 'Comprador',
                'slug' => 'comprador',
            ],
            [
                'name' => 'Delivery',
                'slug' => 'delivery',
            ]
        ];

        foreach ($roles as $key => $role) {
            Rol::create($role);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
         // Crear los roles
         Role::create(['name' => 'SuperAdministrador', 'guard_name' => 'admin']);
         Role::create(['name' => 'Artesano', 'guard_name' => 'admin']);
         Role::create(['name' => 'Vendedor', 'guard_name' => 'admin']);
         Role::create(['name' => 'Delivery', 'guard_name' => 'admin']);
         // Role::create(['name' => 'Comprador', 'guard_name' => 'admin']);
    }
}

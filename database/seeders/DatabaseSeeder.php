<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CreateRolSeeder::class);
        $this->call(CreateUserSeeder::class);
        $this->call(CreateRolUserSeeder::class);
        $this->call(CreateComunidadSeeder::class);
        $this->call(CreateRelacionSeeder::class);

    }
}

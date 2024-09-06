<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Comprador',
               'email'=>'comprador@gmail.com',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Vendedor',
               'email'=>'vendedor@gmail.com',
                'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Delivery',
               'email'=>'delivery@gmail.com',
                'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Admin',
               'email'=>'admin@gmail.com',
               'password'=> bcrypt('123456'),
            ],

        ];

        foreach ($users as $key => $user)
        {
            User::create($user);
        }
    }
}

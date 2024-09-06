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
                'nombre' => 'pepito',
                'apePaterno' => 'perez',
                'apeMaterno' => 'perez',
                'genero' => 'M',
                'celular' => '123456789',
                'email' => 'pepito_perez@gmail.com',
                'password'=> bcrypt('123456'),
                'fechaNac'=> '1990-01-01',
            ],
            [
                'nombre' => 'juanito',
                'apePaterno' => 'perez',
                'apeMaterno' => 'perez',
                'genero' => 'M',
                'celular' => '123456789',
                'email' => 'juanito_perez@gmail.com',
                'password'=> bcrypt('123456'),
                'fechaNac'=> '1990-01-01',
            ],
            [
                'nombre' => 'maria',
                'apePaterno' => 'perez',
                'apeMaterno' => 'perez',
                'genero' => 'F',
                'celular' => '123456789',
                'email' => 'maria_perez@gmail.com',
                'password'=> bcrypt('123456'),
                'fechaNac'=> '1990-01-01',
            ],
            [
                'nombre' => 'luis',
                'apePaterno' => 'perez',
                'apeMaterno' => 'perez',
                'genero' => 'M',
                'celular' => '123456789',
                'email' => 'luis_perez@gmail.com',
                'password'=> bcrypt('123456'),
                'fechaNac'=> '1990-01-01',
            ],
            [
                'nombre' => 'luisa',
                'apePaterno' => 'perez',
                'apeMaterno' => 'perez',
                'genero' => 'F',
                'celular' => '123456789',
                'email' => 'luisa_perez@gmail.com',
                'password'=> bcrypt('123456'),
                'fechaNac'=> '1990-01-01',
            ],

        ];

        foreach ($users as $key => $user)
        {
            User::create($user);
        }
    }
}

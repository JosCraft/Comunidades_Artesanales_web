<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comunidad;

class CreateComunidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comunidad::create([
            'id' => 1,
            'pais' => 'Bolivia',
            'departamento' => 'La Paz',
            'municipio' => 'La Paz',
            'nombre_comunidad' => 'Villa Dolores',
        ]);
        Comunidad::create([
            'id' => 2,
            'pais' => 'Bolivia',
            'departamento' => 'La Paz',
            'municipio' => 'La Paz',
            'nombre_comunidad' => 'Villa Copacabana',
        ]);
    }
}

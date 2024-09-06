<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Administrador;
use App\Models\Comprador;
use App\Models\Comunario;
use App\Models\Delivery;

class CreateRelacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrador::create([
            'id' => 3,
            'cod_Adm' => 'ADM001',
        ]);
        Comprador::create([
            'id' => 4,
        ]);
        Comunario::create([
            'id' => 2,
            'especialidad'=> 'Carpintero',
            'id_comunidad'=> 1,
        ]);
        Delivery::create([
            'id' => 5,
            'servicio' => 'expres',
            'salario' => 2000 ,
            'turno' => 'mañana',
            'id_comunidad' => 1,
        ]);
    }
}

<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CreateCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            [
                'nombre' => 'artesania textil',
                'descripcion' => "Productos hechos a mano con materiales locales",
            ],
            [
                'nombre' => 'ceramica',
                'descripcion' => "Productos hechos a mano con materiales locales",
            ],
            [
                'nombre' => 'consumible',
                'descripcion' => "Productos de consumo diario",
            ],
            [
                'nombre' => 'bebida',
                'descripcion' => "Productos de consumo diario",
            ],
            [
                'nombre' => 'joyeria',
                'descripcion' => "Productos hechos a mano con materiales locales",
            ]
        ];

        foreach ($categorias as $key => $categoria) {
            Categoria::create($categoria);
        }
    }
}

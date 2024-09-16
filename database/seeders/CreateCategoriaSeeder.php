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
                'descripcion' => 'Productos hechos a mano con materiales locales',
                'slug' => 'artesania-textil',
                'categoria_padre' => null, // o el ID de una categoría padre si corresponde
                'estado' => '1',
            ],
            [
                'nombre' => 'ceramica',
                'descripcion' => 'Productos hechos a mano con materiales locales',
                'slug' => 'ceramica',
                'categoria_padre' => null, // o el ID de una categoría padre si corresponde
                'estado' => '1',
            ],
            [
                'nombre' => 'consumible',
                'descripcion' => 'Productos de consumo diario',
                'slug' => 'consumible',
                'categoria_padre' => null, // o el ID de una categoría padre si corresponde
                'estado' => '1',
            ],
            [
                'nombre' => 'bebida',
                'descripcion' => 'Productos de consumo diario',
                'slug' => 'bebida',
                'categoria_padre' => null, // o el ID de una categoría padre si corresponde
                'estado' => '1',
            ],
            [
                'nombre' => 'joyeria',
                'descripcion' => 'Productos hechos a mano con materiales locales',
                'slug' => 'joyeria',
                'categoria_padre' => null, // o el ID de una categoría padre si corresponde
                'estado' => '1',
            ]
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}

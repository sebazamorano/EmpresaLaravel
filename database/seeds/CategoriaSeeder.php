<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Empresa\Categoria::create([
            'nombre' => 'Utiles Escolares'
        ]);

        \Empresa\Categoria::create([
            'nombre' => 'Ropa Hombre'
        ]);

        \Empresa\Categoria::create([
            'nombre' => 'Ropa Mujer'
        ]);


    }
}

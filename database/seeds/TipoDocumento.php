<?php

use Illuminate\Database\Seeder;

class TipoDocumento extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoDocumento = new \Empresa\TipoDocumento();
        $tipoDocumento->nombre = 'Boleta';
        $tipoDocumento->save();

        $tipoDoc = \Empresa\TipoDocumento::create([
            'nombre' => 'Factura'
        ]);
    }
}

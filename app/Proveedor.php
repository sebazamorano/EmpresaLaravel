<?php

namespace Empresa;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';

    protected $fillable = [
        'nombre',
        'direccion',
        'rut',
        'email',
        'telefono',
        'giro'
    ];

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'proveedor_id');
    }
}

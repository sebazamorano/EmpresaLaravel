<?php

namespace Empresa;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'proveedor_id');
    }
}

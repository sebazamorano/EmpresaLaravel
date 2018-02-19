<?php

namespace Empresa;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documento';

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function documento()
    {
        return $this->hasMany(DetalleDocumento::class, 'documento_id');
    }
}

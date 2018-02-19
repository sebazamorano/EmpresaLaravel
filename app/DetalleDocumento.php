<?php

namespace Empresa;

use Illuminate\Database\Eloquent\Model;

class DetalleDocumento extends Model
{
    protected $table = 'detalle_documento';

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function documento()
    {
        return $this->belongsTo(Documento::class, 'documento_id');
    }
}

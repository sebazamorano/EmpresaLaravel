<?php

namespace Empresa;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipo_documento';

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'tipo_documento_id');
    }
}

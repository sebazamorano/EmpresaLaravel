<?php

namespace Empresa;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';

    public function detalleDocumento()
    {
        return $this->hasMany(DetalleDocumento::class, 'producto_id');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'producto_categoria', 'producto_id');
    }
}

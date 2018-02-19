<?php

namespace Empresa;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';

    protected $fillable = [
        'nombre'
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_categoria', 'categoria_id');
    }
}

<?php

namespace Empresa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Documento extends Model
{
    protected $table = 'documento';

    protected $fillable = [
        'numero',
        'tipo_documento_id',
        'proveedor_id',
        'user_id',
        'forma_pago',
        'neto',
        'iva',
        'total'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($documento) {
            $documento->user_id = auth()->user()->getAuthIdentifier();

            $max = self::selectRaw('(COALESCE(max(numero),0) + 1) as numero')
                ->where('tipo_documento_id', $documento->tipo_documento_id)
                ->first();
            $documento->numero  = $max->numero;
        });

    }

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

    public function detalles()
    {
        return $this->hasMany(DetalleDocumento::class, 'documento_id');
    }
}

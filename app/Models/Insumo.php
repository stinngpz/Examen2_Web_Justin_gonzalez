<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
        protected $fillable = [
        'codigo',
        'nombre',
        'categoria',
        'precio',
        'costo',
        'inventario',
        'imagen',
        'fabricante',
        'fecha_vencimiento',
        'fecha_registro',
        'numero_lote',
    ];
}

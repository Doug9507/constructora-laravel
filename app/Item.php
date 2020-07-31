<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'project_id',
        'tipo_operacion',
        'fecha_registro',
        'descripcion',
        'cantidad',
        'precio_unitario',
        'monto_total',
        'tipo_recurso',
        'proveedor',
        'tipo_comprobante',
        'numero_comprobante'
    ];


    public function getGetExcerptAttribute(){
        return substr($this->descripcion,0,50);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'user_id', 'nombre_proyecto', 'saldo_contable', 'entidad_solicitante', 'contratista', 'monto_contratado', 'inicio_obra', 'fin_obra'
   ];

   public function items(){
    return $this->hasMany(Item::class);
   }   
}

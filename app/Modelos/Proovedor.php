<?php

namespace Examen\Modelos;

use Illuminate\Database\Eloquent\Model;

class Proovedor extends Model
{
    protected $table = 'proovedores';
    protected $fillable = ['nombre','direccion','nit','celular','fecha_creacion', 'estado'];
    protected $hidden =['updated_at','deleted_at'];
}

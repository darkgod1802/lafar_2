<?php


namespace Examen\DAO;


use Examen\Modelos\Proovedor;

class ProovedorDAO
{
    public function guardarProovedor(Proovedor $proovedor){
        $proovedor->save();
        return $proovedor;
    }
    public function existeProovedor($id){
        if(Proovedor::where('id','=',$id)->where('deleted_at','=',null)->exists())
            return true;
        return false;
    }
    public function obtenerProovedor($id){
        $proovedor= Proovedor::find($id);
        return $proovedor;
    }
    public function eliminarProovedor($id){
        $proovedor=Proovedor::find($id);
        $proovedor->deleted_at=date("Y-m-d H:i:s");
        $proovedor->estado = false;
        $proovedor->save();
    }

}

<?php


namespace Examen\BL;

use Examen\DAO\ProovedorDAO;
use Examen\Helpers\Error;
use Examen\Modelos\Proovedor;
use Illuminate\Support\Facades\Log;
class ProovedorBL
{
    public function crearProovedor($datos){
        $proovedor=new Proovedor();
        $proovedor->nombre=$datos['nombre'];
        $proovedor->direccion=$datos['direccion'];
        $proovedor->nit=$datos['nit'];
        $proovedor->celular=$datos['celular'];
        $proovedor->fecha_creacion= date('Y-m-d H:i:s');;
        $proovedor->estado= true;
        $adao=new ProovedorDAO();
        $proovedor=$adao->guardarProovedor($proovedor);
        return response()->json($proovedor,201);
    }
    public function leerProovedor($id){
        $adao=new ProovedorDAO();
        if(!$adao->existeProovedor($id)){
            $e=new Error();
            return $e->errorNoEncontrado("El proovedor con id=".$id. " no existe");
        }
        $proovedor=$adao->obtenerProovedor($id);
        return response()->json($proovedor);
    }
    public function eliminarProovedor($id){
        $adao=new ProovedorDAO();
        if(!$adao->existeProovedor($id)){
            $e=new Error();
            return $e->errorNoEncontrado("El proovedor que trata de eliminar no existe");
        }
        $adao->eliminarProovedor($id);
        Log::info("exito");
        return response()->json(null, 204);
    }
    public function actualizarProovedor($datos,$id){
        $adao=new ProovedorDAO();
        if(!$adao->existeProovedor($id)){
            $e=new Error();
            return $e->errorNoEncontrado("El proovedor que trata de editar no existe");
        }
        $proovedor=$adao->obtenerProovedor($id);
        $fields = ['celular', 'nombre', 'estado', 'direccion'];
        foreach($fields as $field){
            if(!empty($datos[$field])){
                $proovedor->$field=$datos[$field];
            }
        }
        $adao=new ProovedorDAO();
        $proovedor=$adao->guardarProovedor($proovedor);
        return response()->json($proovedor,200);
    }
}

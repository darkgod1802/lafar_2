<?php

namespace Examen\Http\Controllers;

use Examen\BL\ProovedorBL;
use Examen\Helpers\Error;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProovedorControlador extends Controller
{
    public function crear(Request $request){
        $validador = Validator::make($request->all(),[
            'nombre'        => 'required|max:20',
            'direccion'   => 'required|max:400',
            'nit'         => 'required|max:10',
            'celular'          => 'required|max:8',
        ]);
        if($validador->fails()){
            $errores = $validador->errors();
            $e=new Error();
            return $e->errorArgumentosInvalidos('No se pudo crear el proovedor, alguno de los '.
            'argumentos es inválido',$errores);
        }
        $datos=$request->json()->all();

        $abl=new ProovedorBL();
        return $abl->crearProovedor($datos);
    }
    public function leer(Request $request,$id){
        $abl=new ProovedorBL();
        return $abl->leerProovedor($id);
    }

    public function eliminar(Request $request,$id){
        $abl=new ProovedorBL();
        return $abl->eliminarProovedor($id);
    }
    public function modificar(Request $request,$id){
        $validador = Validator::make($request->all(),[
            'celular'          => 'max:8',
            'nombre'        => 'max:20',
            'direccion'   => 'max:400',
        ]);
        if($validador->fails()){
            $errores = $validador->errors();
            $e=new Error();
            return $e->errorArgumentosInvalidos('No se pudo actualizar el proovedor, alguno de los '.
                'proovedor es inválido',$errores);
        }
        $datos=$request->json()->all();
        $abl=new ProovedorBL();
        return $abl->actualizarProovedor($datos,$id);
    }
}

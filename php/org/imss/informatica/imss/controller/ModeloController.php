<?php
/**
 * Created by PhpStorm.
 * User: Brayan
 * Date: 16/07/2015
 * Time: 05:12 PM
 */
include_once ("../business/unidades/ClassUnidades.php");
class ModeloController {
    function getListaModelo($arr){
        //Aqui usas un objeto nuevo que llamarás ClassUnidades
        //lo llamas para conectarte solo desde ese objeto puedes conectarte
        //Como ejemplo sería:
        $modelo = new ClassUnidades();
        return $modelo->getListasModelo($arr);
        //Es un ejemplo ok??
        //Ahora lo hare sin conexión
//        $unidades = array(
//          array("id"=>1, "nombre"=>"Unidad 1"),
//          array("id"=>2, "nombre"=>"Unidad 2"),
//          array("id"=>3, "nombre"=>"Otra unidad")
//            );
//        return $unidades;
    }
}

//Usando el controllador
$arr=array();
$controller = new ModeloController();
exit(json_encode($controller->getListaModelo($arr)));

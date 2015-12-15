<?php
/**
 * Created by PhpStorm.
 * User: Brayan
 * Date: 16/07/2015
 * Time: 01:50 PM
 */
include_once ("../business/unidades/ClassUnidades.php");
class MarcaController {
    function getListaMarca($arr){
        //Aqui usas un objeto nuevo que llamarás ClassUnidades
        //lo llamas para conectarte solo desde ese objeto puedes conectarte
        //Como ejemplo sería:
        $marcas = new ClassUnidades();
        return $marcas->getListasMarca($arr);
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
$controller = new MarcaController();
exit(json_encode($controller->getListaMarca($arr)));

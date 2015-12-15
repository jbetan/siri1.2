<?php
/**
 * Created by PhpStorm.
 * User: Brayan
 * Date: 18/06/2015
 * Time: 04:23 PM
 */
include_once ("../business/unidades/ClassUnidades.php");
class TipoController {
    function getListaTipo($arr){
        //Aqui usas un objeto nuevo que llamarás ClassUnidades
        //lo llamas para conectarte solo desde ese objeto puedes conectarte
        //Como ejemplo sería:
        $tipos = new ClassUnidades();
        return $tipos->getListasTipo($arr);
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
$controller = new TipoController();
exit(json_encode($controller->getListaTipo($arr)));

<?php
/**
 * Created by PhpStorm.
 * User: Brayan
 * Date: 16/07/2015
 * Time: 05:32 PM
 */
include_once ("../business/unidades/ClassUnidades.php");
class AreaController {
    function getListaArea($arr){

        $modelo = new ClassUnidades();
        return $modelo->getListasArea($arr);

    }
}

//Usando el controllador
$arr=array();
$controller = new AreaController();
exit(json_encode($controller->getListaArea($arr)));

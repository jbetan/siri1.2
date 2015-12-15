<?php

include_once ("../business/unidades/ClassUnidades.php");
class UnidadesController {
    function getListaUnidades($arr){
        
        $unidades = new ClassUnidades();
        return $unidades->getListas($arr);
        return $unidades;
    }
}

$arr=array();
$controller = new UnidadesController();
exit(json_encode($controller->getListaUnidades($arr)));

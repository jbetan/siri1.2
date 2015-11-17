<?php
session_name("EnterAccessCFERecibos");
session_start();
include_once("../business/asignacion/ClassAsignacion.php");
$as = new ClassAsignacion();

if($_GET["getFolio"]){
    exit(json_encode($as->getFolio()));
}
elseif($_GET["getUsuarios"]){
    exit(json_encode($as->autoNombre()));
}
elseif($_GET['buscarReporte']){
    exit(json_encode($as->findReporteById($_REQUEST["id"])));
}
elseif($_GET["saveReporte"]){
    try {
        if ($as->guardarReporte($_REQUEST)) {
         exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));
        }
        else {
            exit(json_encode(array("error" => true, "message" => "Error inesperado, verifique los datos")));
        }
    } catch (Exception $e){
        exit(json_encode(array("error" => true,"otro"=>"catch", "message" => $e->getMessage())));
    }
}

elseif ($_GET['buscarClase']){
    exit(json_encode($as->findClase()));
}
elseif ($_GET['getReportes']){
     $data = $as->getReportes();
    exit(json_encode($data));
}
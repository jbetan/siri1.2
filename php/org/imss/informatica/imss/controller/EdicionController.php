<?php
session_name("EnterAccessCFERecibos");
session_start();
include_once("../business/control/ClassEdicion.php");
$edicion = new ClassEdicion();

if($_GET["getFolio"]){
    exit(json_encode($edicion->auto()));
}elseif($_GET["getUsuarios"]) {
    exit(json_encode($edicion->autoNombre()));
}elseif($_GET['buscarReporte']){
    exit(json_encode($edicion->findReporteById($_REQUEST["id"])));
}elseif($_GET["saveReporte"]){
    try {
        if ($edicion->guardarReporte($_REQUEST)) {

            exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));
        } else {
            exit(json_encode(array("error" => true, "message" => "Error inesperado, verifique los datos")));
        }
    } catch (Exception $e) {
        exit(json_encode(array("error" => true,"otro"=>"catch", "message" => $e->getMessage())));
    }
}elseif ($_GET['buscarUsuario']){
    exit(json_encode($edicion->findUsuarioByTipo($_REQUEST["nivel"], $_REQUEST["subnivel"])));
}elseif($_GET["buscarActividad"]) {
    exit(json_encode($edicion->findActivities()));
}





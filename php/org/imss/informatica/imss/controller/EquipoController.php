<?php
session_name("EnterAccessCFERecibos");
session_start();
include_once("../business/administrador/ClassEquipo.php");
$equipo = new ClassEquipo();

if($_GET["saveEquipos"]){
    try {
        if ($equipo->guardarEquipos($_REQUEST)) {
            exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));
        } else {
            exit(json_encode(array("error" => true, "message" => "Error inesperado, verifique los datos")));
        }
    }catch(Exception $e) {
        exit(json_encode(array("error" => true, "message" =>$e->getMessage())));
    }
}elseif($_GET["verEquipos"]) {

    $equipo->setDtcEquipos();
    $data = $equipo->getEquiposByDataTable($_REQUEST["draw"], $_REQUEST["columns"], $_REQUEST["order"], $_REQUEST["start"], $_REQUEST["length"], $_REQUEST["search"]["value"]);
    exit(json_encode($data));

}elseif ($_GET["editarEquipos"]){
    exit(json_encode($equipo->findEquipoById($_REQUEST["id"])));
}elseif ($_GET["eliminarEquipos"]){
    try {
        if ($equipo->deleteEquipos($_GET["id"])) {
            exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));
        } else {
            exit(json_encode(array("error" => true, "message" => "Error inesperado, verifique los datos")));
        }
    }catch(Exception $e) {
        exit(json_encode(array("error" => true, "message" =>$e->getMessage())));
    }

}elseif($_GET["getlista"])
{
    exit(json_encode( $equipo->auto()));

}elseif($_GET["getTipo"])
{
    exit(json_encode( $equipo->autoTipo()));
}



<?php
session_name("EnterAccessCFERecibos");
session_start();

include_once("../business/administrador/ClassAdmin.php");
$admin = new ClassAdmin();

if($_GET["saveUnidades"]) {
    try {
        if ($admin->guardarUnidades($_REQUEST)) {

            exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));
        } else {
            exit(json_encode(array("error" => true, "message" => "Error inesperado, verifique los datos")));
        }
    } catch (Exception $e) {
        exit(json_encode(array("error" => true,"otro"=>"catch", "message" => $e->getMessage())));
    }
}elseif($_GET["verUnidades"]) {
   // print_r("Controller 1");
    $admin->setDtcUnidades();
    //print_r("Controller 2");
    $data = $admin->getUnidadesByDataTable($_REQUEST["draw"], $_REQUEST["columns"], $_REQUEST["order"], $_REQUEST["start"], $_REQUEST["length"], $_REQUEST["search"]["value"]);
    exit(json_encode($data));
}elseif ($_GET["editarUnidad"]){
    exit(json_encode($admin->findUnidadById($_REQUEST["id"])));
}elseif ($_GET["eliminarUnidad"]){
    try {
        if ($admin->deleteUnidad($_GET["id"])) {
            exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));
        } else {
            exit(json_encode(array("error" => true, "message" => "Error inesperado, verifique los datos")));
        }
    }catch(Exception $e) {
        exit(json_encode(array("error" => true, "message" =>$e->getMessage())));
    }

}




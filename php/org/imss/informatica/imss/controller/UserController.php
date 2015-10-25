<?php
session_name("EnterAccessCFERecibos");
session_start();
include_once("../business/administrador/ClassUser.php");
$user = new ClassUser();

if($_GET["saveUsuarios"]) {
    try {
        if ($user->guardarUsuarios($_REQUEST)) {

            exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));
        } else {
            exit(json_encode(array("error" => true, "message" => "Error inesperado, verifique los datos")));
        }
    } catch (Exception $e) {
        exit(json_encode(array("error" => true, "message" => $e->getMessage())));
    }
}elseif($_GET["verUser"])
{

    $user->setDtcUsuarios();
    $data = $user->getUsuariosByDataTable($_REQUEST["draw"], $_REQUEST["columns"], $_REQUEST["order"], $_REQUEST["start"], $_REQUEST["length"], $_REQUEST["search"]["value"]);
    exit(json_encode($data));

}
elseif ($_GET["editarUser"]){
    exit(json_encode($user->findUserById($_REQUEST["id"])));
}elseif ($_GET["eliminarUser"]){
    try {
        if ($user->deleteUser($_GET["id"])) {
            exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));
        } else {
            exit(json_encode(array("error" => true, "message" => "Error inesperado, verifique los datos")));
        }
    }catch(Exception $e) {
        exit(json_encode(array("error" => true, "message" =>$e->getMessage())));
    }

}elseif ($_GET["getUnidades"]){
    exit(json_encode($user->autoUnidades()));
}

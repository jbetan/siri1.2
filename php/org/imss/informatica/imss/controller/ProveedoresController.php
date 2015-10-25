<?php
/**
 * User: Renan
 * Date: 07/05/2015
 * Time: 04:24 AM
 */
session_name("EnterAccessCFERecibos");
session_start();
include_once("../business/proveedores/ClassProveedores.php");
$proveedores = new ClassProveedores();
if($_GET["id"]) {
    exit(json_encode($proveedores->findProveedorById($_REQUEST["id"])));
}else if($_GET["save"]) {
    try {
        if ($proveedores->saveProveedor($_REQUEST)) {
            exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));
        } else {
            exit(json_encode(array("error" => true, "message" => "Error inesperado, verifique los datos")));
        }
    }catch(Exception $e) {
        exit(json_encode(array("error" => true, "message" =>$e->getMessage())));
    }
}elseif($_GET["delete"]) {
    try {
        if ($proveedores->deleteProveedor($_GET["delete"])) {
            exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));
        } else {
            exit(json_encode(array("error" => true, "message" => "Error inesperado, verifique los datos")));
        }
    }catch(Exception $e) {
        exit(json_encode(array("error" => true, "message" =>$e->getMessage())));
    }
}elseif($_GET["getList"]){
    exit(json_encode($proveedores->findProveedores($_REQUEST["value"])));
}else {
    $proveedores->setDataTableColumns();
    $data = $proveedores->getProveedoresByDataTable($_REQUEST["draw"], $_REQUEST["columns"], $_REQUEST["order"], $_REQUEST["start"], $_REQUEST["length"], $_REQUEST["search"]["value"]);
    exit(json_encode($data));
}
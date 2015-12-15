<?php
/**
 * Created by PhpStorm.
 * User: Brayan
 * Date: 29/07/2015
 * Time: 01:31 PM
 */
session_name();
session_start();
include_once("../business/asignacionBrayan/ClassAsignar.php");
$saveAsignacion= new ClassAsignar();
if($_GET['save']){
    try{
        if (json_encode($saveAsignacion->saveAgignacion($_REQUEST))) {
            exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));
        } else {
            exit(json_encode(array("error" => true, "message" => "Error inesperado, verifique los datos")));
        }
    }catch(Exception $e) {
        exit(json_encode(array("error" => true, "message" =>$e->getMessage())));
    }
}
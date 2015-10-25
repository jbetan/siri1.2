<?php
/**
 * User: Renan
 * Date: 04/05/2015
 * Time: 12:00 AM
 */
include_once("ControllerPrincipal.php");
session_name("EnterAccessCFERecibos");
session_start();
$index = new ControllerPrincipal("decorators/IndexDecorator.php", "ADMIN CONTRARECIBOS - Index");
$index->setOpcionMenu("Oficial");
if($index->validaAcceso()) {
    unset($_SESSION["actionForm"]);
  
    $index->page();
}else{
    $_SESSION["actionForm"] = "app";
    header("location: login");
}
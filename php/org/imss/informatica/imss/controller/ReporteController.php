<?php
/**
 * Created by PhpStorm.
 * User: J. Betancourt
 * Date: 09/07/2015
 * Time: 05:58 PM
 */



include_once("ControllerPrincipal.php");
session_name("EnterAccessCFERecibos");
session_start();
$index = new ControllerPrincipal("template/reporte/reporte2.html", "ADMIN CONTRARECIBOS - Index");
$index->setOpcionMenu("Oficial");
if($index->validaAcceso()) {
    unset($_SESSION["actionForm"]);

    $index->page();
}else{
    $_SESSION["actionForm"] = "app";
    header("location: login");
}




include_once ("../business/reportes/ClassReportes.php");
$rep = new ClassReporte();

if($_GET["id"])
{
    exit(json_encode($rep->buscarReportePorId($_REQUEST["id"])));
}
    elseif($_GET["save"])
    {
        try {
            if ($rep->guardarReporte($_REQUEST)) {
                exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));
            } else {
                exit(json_encode(array("error" => true, "message" => "Error inesperado, verifique los datos")));
            }
        }catch(Exception $e) {
            exit(json_encode(array("error" => true, "message" =>$e->getMessage())));
        }
    }

    elseif($_GET["getList"])
    {
       exit(json_encode($rep->buscarReportePorValor($_REQUEST["value"])));
    }

    elseif($_GET["repNuevos"])
    {
        $rep->setDataTableColumnsNuev();
        $data = $rep->getReportesNuevByDataTable($_REQUEST["draw"], $_REQUEST["columns"], $_REQUEST["order"], $_REQUEST["start"], $_REQUEST["length"], $_REQUEST["search"]["value"]);
        exit(json_encode($data));

    }
else
{
    $rep->setDataTableColumnsAsig();
    $data = $rep->getReportesAsigByDataTable($_REQUEST["draw"], $_REQUEST["columns"], $_REQUEST["order"], $_REQUEST["start"], $_REQUEST["length"], $_REQUEST["search"]["value"]);
    exit(json_encode($data));
}

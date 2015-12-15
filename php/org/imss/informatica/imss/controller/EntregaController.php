<?php
session_name("EnterAccessCFERecibos");
session_start();
include_once("../business/control/ClassEntrega.php");
$entrega = new ClassEntrega();




if($_GET["getFolio"])
{
    exit(json_encode($entrega->auto()));
}
elseif($_GET['getFolioAutoEdicion'])
{
     exit(json_encode($entrega->getFolioAutoEdicion()));
}

elseif($_GET['buscarReporte'])
{
    exit(json_encode($entrega->findReporteById($_REQUEST["id"])));
}elseif($_GET["guardarRepEntrega"]){
    try {
        $res = $entrega->guardarReporteEntrega($_REQUEST);
        if ($res == 1) {
            exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));
        }elseif ($res == 2){
            exit(json_encode(array("error" => true, "message" => "Error inesperado, verifique los datos")));
        }elseif ($res == 3){
            exit(json_encode(array("error" => true, "message" => "El equipo no esta listo para entregar")));
        }
    } catch (Exception $e) {
        exit(json_encode(array("error" => true,"otro"=>"catch", "message" => $e->getMessage())));
    }
}







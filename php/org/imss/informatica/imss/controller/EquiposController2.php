<?php


include_once("../business/Equipos/ClassEquipos.php");
include_once("ControllerPrincipal.php");

class EquiposController extends  ControllerPrincipal{

    public function saveReporteAutocomplete($data)
    {
        $saveEquipoAuto= new ClassEquipos();
        try{
            if (json_encode($saveEquipoAuto->saveReporteAutocomplete($data))) {
                exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));

            } else {
                exit(json_encode(array("error" => true, "message" => "Error inesperado, verifique los datos")));
            }
        }catch(Exception $e) {
            exit(json_encode(array("error" => true, "message" =>$e->getMessage())));
        }
    }


}

$Equipospage = new EquiposController ("equipos/equipos_computo2.php", "zzGenerar Reporte - Levantamiento");

if($_GET['save'])
{
    exit($Equipospage->saveReporteAutocomplete($_REQUEST));
}
$Equipospage->page();


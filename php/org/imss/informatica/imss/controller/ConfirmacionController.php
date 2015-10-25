<?php
/**
 * Created by PhpStorm.
 * User: Brayan
 * Date: 22/07/2015
 * Time: 09:06 AM
 */
include_once("ControllerPrincipal.php");
include_once("../business/Equipos/ClassEquipos.php");
class ConfirmacionController extends  ControllerPrincipal{
    private $actionForm = "";


    /**
     * @return string
     */
    public function getActionForm()
    {
        return $this->actionForm;
    }

    /**
     * @param string $actionForm
     */
    public function setActionForm($actionForm)
    {

        $this->actionForm = $actionForm;
    }
    public function search($ip)
    {

        $equipo= new ClassEquipos();
        return json_encode($equipo->getIP($ip));

    }
    public function saveReporte($array)
    {
        $saveEquipo= new ClassEquipos();
        try{
            if (json_encode($saveEquipo->saveReporte($array))) {
                exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));
            } else {
                exit(json_encode(array("error" => true, "message" => "Error inesperado, verifique los datos")));
            }
        }catch(Exception $e) {
            exit(json_encode(array("error" => true, "message" =>$e->getMessage())));
        }
    }
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

$confirmacionpage= new ConfirmacionController("confirmacion/confirmacion.php", "Generar Reporte - Confirmacion");
//else haciendo el guardado
$confirmacionpage->page();
<?php
/**
 * Created by PhpStorm.
 * User: Brayan
 * Date: 29/07/2015
 * Time: 01:35 PM
 */
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector.php");
class ClassAsignar extends class_mysqlconnector
{
    function __construct()
    {
        $this->LeerConfiguracion();
        $this->Conectar();
    }
    public function saveAgignacion($array)
    {
            $this->setValue("clasificar", $array["clasificar"]);
            $this->setValue("tipo", $array["tipo"]);
            $this->setValue("clase", $array["clase"]);
            $this->setValue("prioridad", $array["prioridad"]);
            $this->setValue("tipo_usuario", $array["tipo_usuario"]);
            $this->setValue("asignar", $array["asignar"]);
            $this->setValue("nombre", $array["nombre"]);
            $this->setValue("estatus", $array["asignar"]);
            $this->IniciarTransaccion();
            if ($this->insertar("asignacion")) {
                $this->CometerTransaccion();
                return true;
            }
            $this->DeshacerTransaccion();
            return false;
    }
}
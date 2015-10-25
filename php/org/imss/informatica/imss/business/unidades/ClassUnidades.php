<?php
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector.php");
class ClassUnidades extends class_mysqlconnector
{
    function __construct()
    {
        $this->LeerConfiguracion();
        $this->Conectar();
    }

    public function getListas($arr)
    {

        //$this->setValue("areasoporte",$arr["direccion"]);
        $arreglo = $this->devuelve_filas_indexlabel("unidad", "id, nombre");

            if(is_array($arreglo))
            {
                return $arreglo;
            }
            else
            {
                return array();
            }
    }
    public function getListasTipo($arr)
    {

        //$this->setValue("areasoporte",$arr["direccion"]);
        $arreglo = $this->devuelve_filas_indexlabel("tipo", "id, descripcion");

        if(is_array($arreglo))
        {
            return $arreglo;
        }
        else
        {
            return array();
        }
    }
    public function getListasMarca($arr)
    {

        //$this->setValue("areasoporte",$arr["direccion"]);
        $arreglo = $this->devuelve_filas_indexlabel("marca", "id, descripcion");

        if(is_array($arreglo))
        {
            return $arreglo;
        }
        else
        {
            return array();
        }
    }
    public function getListasModelo($arr)
    {

        //$this->setValue("areasoporte",$arr["direccion"]);
        $arreglo = $this->devuelve_filas_indexlabel("equipo", "id_equipo, modelo");

        if(is_array($arreglo))
        {
            return $arreglo;
        }
        else
        {
            return array();
        }
    }
    public function getListasArea($arr)
    {

        //$this->setValue("areasoporte",$arr["direccion"]);
        $arreglo = $this->devuelve_filas_indexlabel("area", "id, nombre");

        if(is_array($arreglo))
        {
            return $arreglo;
        }
        else
        {
            return array();
        }
    }
}
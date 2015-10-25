<?php
/**
 * Created by PhpStorm.
 * User: J. Betancourt
 * Date: 09/07/2015
 * Time: 04:05 PM
 */

include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector.php");
include_once(dirname(__FILE__)."/../../commons/class_utils.php");

class ClassReporte extends class_mysqlconnector
{
    private $dataTableReportesAsig = array();
    private $dataTableReportesNuev = array();


    //Desplegar Reporte Nuevos
    public function getDataTableColumnsNuev()
    {
        return $this->dataTableReportesNuev;
    }

    public function setDataTableColumnsNuev()
    {
        $this->dataTableReportesNuev = array (
            array("nombre"=>"id", "tipo"=>Utils::$TIPO_NUMERO),
            array("nombre"=>"unidad", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"area", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"tipo", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"marca", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"modelo", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"serie", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"ip", "tipo"=>Utils::$TIPO_TEXTO),

            array("nombre"=>"fechaRecepcion", "tipo"=>Utils::$TIPO_TEXTO),
        );
    }

    public function getReportesNuevByDataTable($draw, $columns, $order, $start, $length, $search) {
        $cols = "";
        foreach($this->dataTableReportesNuev as $col) {
            $cols.= ( $cols ? "," : "" ).$col["nombre"];
        }
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $where = Utils::getComplementDataTableQuery($this->dataTableReportesNuev, $columns, $order, 0, -1, $search);
        $sql = "SELECT count(*) FROM reporte WHERE 1 ".$where;
        $res = $this->EjecutarConsulta($sql);
        $total = mysql_result($res, 0,0);

        $where = Utils::getComplementDataTableQuery($this->dataTableReportesNuev, $columns, $order, $start, $length, $search);
        $sql = "SELECT $cols FROM reporte WHERE 1 ".$where;
        $res = $this->EjecutarConsulta($sql);
        $rows = array();
        while($row = mysql_fetch_assoc($res)){
            $rows[] = $row;
        }
        return array(
            "draw"=> $_REQUEST["draw"],
            "recordsTotal"=> $total,
            "recordsFiltered"=> $total,
            "data"=>$rows
        );
    }


    //Desplegar Reportes Asignados
    public function getDataTableColumnsAsig()
    {
        return $this->dataTableReportesAsig;
    }

       public function setDataTableColumnsAsig()
    {
        $this->dataTableReportesAsig = array (
            array("nombre"=>"id", "tipo"=>Utils::$TIPO_NUMERO),
            array("nombre"=>"unidad", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"area", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"tipo", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"marca", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"modelo", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"serie", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"ip", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"descripcion", "tipo"=>Utils::$TIPO_TEXTO),

            array("nombre"=>"estatus", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"fechaRecepcion", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"asignado", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"fechaTermino", "tipo"=>Utils::$TIPO_TEXTO),

        );
    }

    public function getReportesAsigByDataTable($draw, $columns, $order, $start, $length, $search) {
        $cols = "";
        foreach($this->dataTableReportesAsig as $col) {
            $cols.= ( $cols ? "," : "" ).$col["nombre"];
        }
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $where = Utils::getComplementDataTableQuery($this->dataTableReportesAsig, $columns, $order, 0, -1, $search);
        $sql = "SELECT count(*) FROM reporte WHERE 1 ".$where;
        $res = $this->EjecutarConsulta($sql);
        $total = mysql_result($res, 0,0);

        $where = Utils::getComplementDataTableQuery($this->dataTableReportesAsig, $columns, $order, $start, $length, $search);
        $sql = "SELECT $cols FROM reporte WHERE 1 ".$where;
        $res = $this->EjecutarConsulta($sql);
        $rows = array();
        while($row = mysql_fetch_assoc($res)){
            $rows[] = $row;
        }
        return array(
            "draw"=> $_REQUEST["draw"],
            "recordsTotal"=> $total,
            "recordsFiltered"=> $total,
            "data"=>$rows
        );
    }



    //Este metodo recibe un arreglo con los datos a guardar en la base de datos
    public function guardarReporte($reporte)
    {
        $this->setKey("id", $reporte["id"]);
        $buscar = $this->devuelve_fila_i("reportes");
        if($buscar)
        {
            $this->setValue("unidad", $reporte["unidad"]);
            $this->setValue("area", $reporte["area"]);
            $this->setValue("tipo", $reporte["tipo"]);
            $this->setValue("marca", $reporte["marca"]);
            $this->setValue("modelo", $reporte["modelo"]);
            $this->setValue("serie", $reporte["serie"]);
            $this->setValue("ip", $reporte["ip"]);
            $this->setValue("descripcion", $reporte["descripcion"]);

            $this->setValue("estatus", $reporte["estatus"]);
            $this->setValue("fechaRecepcion", $reporte["fechaRecepcion"]);
            $this->setValue("asignado", $reporte["asignado"]);
            $this->setValue("fechaTermino", $reporte["fechaTermino"]);
            if ($this->actualizar("reporte")) {
                return true;
            }
        }else
            {
                $this->setValue("unidad", $reporte["unidad"]);
                $this->setValue("area", $reporte["area"]);
                $this->setValue("tipo", $reporte["tipo"]);
                $this->setValue("marca", $reporte["marca"]);
                $this->setValue("modelo", $reporte["modelo"]);
                $this->setValue("serie", $reporte["serie"]);
                $this->setValue("ip", $reporte["ip"]);
                $this->setValue("descripcion", $reporte["descripcion"]);

                $this->setValue("estatus", $reporte["estatus"]);
                $this->setValue("fechaRecepcion", $reporte["fechaRecepcion"]);
                $this->setValue("asignado", $reporte["asignado"]);
                $this->setValue("fechaTermino", $reporte["fechaTermino"]);
                if ($this->insertar("reporte")) {
                    return true;
                }
            }
        return false;
    }



    public function buscarReportePorId($id)
    {
        $this->setKey("id",$id);
        $fila = $this->devuelve_fila_i("reportes");
        if($fila){
            return $fila;
        }
        return array();
    }

    public function buscarReportePorValor($value){
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $sql = "SELECT * FROM reportes WHERE estatus like '%$value%' OR tipo like '%$value%' OR unidad like '%$value%' OR responsablelike '%$value%' ";
        $res = $this->EjecutarConsulta($sql);
        $filas = array();
        while($fila = mysql_fetch_assoc($res)) {
            $filas[] = $fila;
        }
        return $filas;
    }


}








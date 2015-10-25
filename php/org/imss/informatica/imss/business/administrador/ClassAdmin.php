<?php
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector.php");
include_once(dirname(__FILE__)."/../../commons/class_utils.php");

class ClassAdmin extends  class_mysqlconnector
{

    private $dtcUnidades = array();

    public function getDtcUnidades()
    {
        return $this->dtcUnidades;
    }
    public function setDtcUnidades()
    {

        $this->dtcUnidades = array (
            array("nombre"=>"id", "tipo"=>Utils::$TIPO_NUMERO),
            array("nombre"=>"nombre", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"direccion", "tipo"=>Utils::$TIPO_TEXTO),
            //array("nombre"=>"posiciong", "tipo"=>Utils::$TIPO_TEXTO)
        );


    }

    public function getUnidadesByDataTable($draw, $columns, $order, $start, $length, $search) {
        $cols = "";

        foreach($this->dtcUnidades as $col) {
            $cols.= ( $cols ? "," : "" ).$col["nombre"];
        }
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $where = Utils::getComplementDataTableQuery($this->dtcUnidades, $columns, $order, 0, -1, $search);
        $sql = "SELECT count(*) FROM unidad WHERE 1 ".$where;
        $res = $this->EjecutarConsulta($sql);
        $total = mysql_result($res, 0,0);

        $where = Utils::getComplementDataTableQuery($this->dtcUnidades, $columns, $order, $start, $length, $search);

        $sql = "SELECT $cols FROM unidad WHERE 1 ".$where;
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

    public function findUnidadById($id) {
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("id", $id);
        $fila = $this->devuelve_fila_i("unidad");
        if($fila) {
            return $fila;
        }
        return array();
    }

    public function deleteUnidad($id) {
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("id", $id);
        $find = $this->devuelve_fila_i("unidad");
        if($find) {
            $this->IniciarTransaccion();
            $this->setKey("id", $id);
            if($this->eliminar("unidad")){
                $this->CometerTransaccion();
                return true;
            }
        }
       $this->DeshacerTransaccion();
        return false;
    }


    public function guardarUnidades($unidad) {
        $this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("id", $unidad["id"]);
        $find = $this->devuelve_fila_i("unidad");
        if($find) {
            $this->setKey("id", $unidad["id"]);
            $this->setValue("nombre", $unidad["nombre"]);
            $this->setValue("direccion", $unidad["direccion"]);
            //$this->setValue("areasoporte", $unidad["areasoporte"]);
            $this->IniciarTransaccion();
            if($this->actualizar("unidad")){
                $this->CometerTransaccion();
                return true;
            }
        } else {
            $this->setValue("nombre", $unidad["nombre"]);
            $this->setValue("direccion", $unidad["direccion"]);
            //$this->setValue("areasoporte", $unidad["areasoporte"]);
            $this->IniciarTransaccion();
            if($this->insertar("unidad")) {
                $this->CometerTransaccion();
                return true;
            }
        }
        $this->DeshacerTransaccion();
        return false;
    }


}
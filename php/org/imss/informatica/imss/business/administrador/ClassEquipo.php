<?php
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector.php");
include_once(dirname(__FILE__)."/../../commons/class_utils.php");

class ClassEquipo extends  class_mysqlconnector
{
    private $dtcEquipos = array();

    // Equipos
    public function getDtcEquipos()
    {
        return $this->dtcEquipos;
    }
    public function setDtcEquipos()
    {
        $this->dtcEquipos = array (
            array("nombre"=>"id", "tipo"=>Utils::$TIPO_NUMERO),
            array("nombre"=>"idtipo", "tipo"=>Utils::$TIPO_NUMERO),
            array("nombre"=>"idmarca", "tipo"=>Utils::$TIPO_NUMERO),
            array("nombre"=>"modelo", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"numdeserie", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"etiqueta", "tipo"=>Utils::$TIPO_TEXTO),
        );


    }

    public function getEquiposByDataTable($draw, $columns, $order, $start, $length, $search) {
        $cols = "";
        foreach($this->dtcEquipos as $col) {
            $cols.= ( $cols ? "," : "" ).$col["nombre"];
        }
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $where = Utils::getComplementDataTableQuery($this->dtcEquipos, $columns, $order, 0, -1, $search);
        $sql = "SELECT count(*) FROM equipos WHERE 1 ".$where;
        $res = $this->EjecutarConsulta($sql);
        $total = mysql_result($res, 0,0);

        $where = Utils::getComplementDataTableQuery($this->dtcEquipos, $columns, $order, $start, $length, $search);

        $sql = "SELECT $cols FROM equipos WHERE 1 ".$where;
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

    public function get_equipos()
    {

        $sql  = "SELECT 
        e.id,
        e.modelo,
        e.numdeserie,
        e.etiqueta,
        t.descripcion as tipo,
        m.descripcion as marca 
        FROM equipos e
        LEFT JOIN tipo t ON (e.idtipo = t.id)
        LEFT JOIN marca m ON (e.idmarca = m.id )
        ORDER BY id ASC";  
     
        $res = $this->EjecutarConsulta($sql);
        
        $k = 0;
        while($fila = @mysql_fetch_assoc($res)){  
            $valores[$k++] = $fila; 
        }
       
        if(isset($valores)) return $valores;

    }

    public function guardarEquipos($equipo) {

        $this->setKey("descripcion",$equipo["idmarca"] );
        $marca = $this->devuelve_fila_i("marca");
        $this->setKey("descripcion",$equipo["idtipo"] );
        $tipo = $this->devuelve_fila_i("tipo");
        $this->setKey("id", $equipo["id"]);
        $find = $this->devuelve_fila_i("equipos");

     


        if($find) {
            print_r('update');
            $this->setKey("id", $equipo["id"]);
            $this->setValue("idtipo", $tipo['id']);
            $this->setValue("idmarca", $marca['id']);
            $this->setValue("modelo", $equipo["modelo"]);
            $this->setValue("numdeserie", $equipo["numdeserie"]);
            $this->setValue("etiqueta", $equipo["etiqueta"]);
            $update = $this->actualizar("equipos");
            $this->IniciarTransaccion();
            if($update and $tipo and $marca){
                print_r('upd trans');
                $this->CometerTransaccion();
                return true;
            }
        } else {
            $this->setValue("idtipo", $tipo['id']);
            $this->setValue("idmarca", $marca['id']);
            $this->setValue("modelo", $equipo["modelo"]);
            $this->setValue("numdeserie", $equipo["numdeserie"]);
            $this->setValue("etiqueta", $equipo["etiqueta"]);
            $insert = $this->insertar("equipos");
            $this->IniciarTransaccion();
            if($insert and $tipo and $marca) {

                $this->CometerTransaccion();
                return true;
            }
        }
        $this->DeshacerTransaccion();
        return false;

    }

    public function findEquipoById($id) {
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
       
        $sql  = "SELECT 
        e.id ,
        e.modelo,
        e.numdeserie,
        e.etiqueta,
        t.descripcion as idtipo,
        m.descripcion as idmarca 
        FROM equipos e
        LEFT JOIN tipo t ON (e.idtipo = t.id)
        LEFT JOIN marca m ON (e.idmarca = m.id )
        WHERE e.id = '{$id}' ";  
     
        $res = $this->EjecutarConsulta($sql);
        
        $k = 0;
        while($fila = @mysql_fetch_assoc($res)){  
           return $fila; 
        }
       
        //if(isset($valores)) return $valores;
    }

    public function deleteEquipos($id) {
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("id", $id);
        $find = $this->devuelve_fila_i("equipos");
        if($find) {
            $this->IniciarTransaccion();
            $this->setKey("id", $id);
            if($this->eliminar("equipos")){
                $this->CometerTransaccion();
                return true;
            }
        }
        $this->DeshacerTransaccion();
        return false;
    }

    public function auto ()
    {
        $data = $this->devuelve_filas_indexlabel("marca", "id, descripcion");
        return $data;
    }

    public function autoTipo ()
    {
        $data = $this->devuelve_filas_indexlabel("tipo", "id, descripcion");
        return $data;
    }



}
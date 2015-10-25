<?php
/**
 * User: Renan
 * Date: 07/05/2015
 * Time: 04:22 AM
 */
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector.php");
include_once(dirname(__FILE__)."/../../commons/class_utils.php");
class ClassProveedores extends class_mysqlconnector{
    private $proveedor;
    private $listProveedores;

    private $dataTableColumns = array();

    /**
     * @return array
     */
    public function getDataTableColumns()
    {
        return $this->dataTableColumns;
    }

    /**
     * @param array $dataTableColumns
     */
    public function setDataTableColumns()
    {
        $this->dataTableColumns = array (
            array("nombre"=>"id", "tipo"=>Utils::$TIPO_NUMERO),
            array("nombre"=>"acreedor", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"nombre", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"correo", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"rfc", "tipo"=>Utils::$TIPO_TEXTO),
            array("nombre"=>"cuenta", "tipo"=>Utils::$TIPO_TEXTO)
        );
    }



    /**
     * @return mixed
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * @param mixed $proveedor
     */
    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;
    }

    /**
     * @return mixed
     */
    public function getListProveedores()
    {
        return $this->listProveedores;
    }

    /**
     * @param mixed $listProveedores
     */
    public function setListProveedores($listProveedores)
    {
        $this->listProveedores = $listProveedores;
    }

    public function getProveedoresByDataTable($draw, $columns, $order, $start, $length, $search) {
        $cols = "";
        foreach($this->dataTableColumns as $col) {
            $cols.= ( $cols ? "," : "" ).$col["nombre"];
        }
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $where = Utils::getComplementDataTableQuery($this->dataTableColumns, $columns, $order, 0, -1, $search);
        $sql = "SELECT count(*) FROM proveedores WHERE 1 ".$where;
        $res = $this->EjecutarConsulta($sql);
        $total = mysql_result($res, 0,0);

        $where = Utils::getComplementDataTableQuery($this->dataTableColumns, $columns, $order, $start, $length, $search);

        $sql = "SELECT $cols FROM proveedores WHERE 1 ".$where;
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

    public function findProveedorById($id) {
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("id", $id);
        $fila = $this->devuelve_fila_i("proveedores");
        if($fila) {
            return $fila;
        }
        return array();
    }

    public function saveProveedor($proveedor) {
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("id", $proveedor["id"]);
        $find = $this->devuelve_fila_i("proveedores");
        if($find) {
            $this->setKey("id", $proveedor["id"]);
            $this->setValue("acreedor", $proveedor["acreedor"]);
            $this->setValue("nombre", $proveedor["nombre"]);
            $this->setValue("rfc", $proveedor["rfc"]);
            $this->setValue("correo", $proveedor["correo"]);
            $this->setValue("cuenta", $proveedor["cuenta"]);
            if($this->actualizar("proveedores")){
                return true;
            }
        } else {
            $this->setValue("acreedor", $proveedor["acreedor"]);
            $this->setValue("nombre", $proveedor["nombre"]);
            $this->setValue("rfc", $proveedor["rfc"]);
            $this->setValue("correo", $proveedor["correo"]);
            $this->setValue("cuenta", $proveedor["cuenta"]);
            if($this->insertar("proveedores")) {
                return true;
            }
        }
        return false;
    }

    public function deleteProveedor($id) {
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("id", $id);
        $find = $this->devuelve_fila_i("proveedores");
        if($find) {
            $this->setKey("id", $id);
            if($this->eliminar("proveedores")){
                return true;
            }
        }
        return false;
    }

    public function findProveedores($value){
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $sql = "SELECT id, acreedor, nombre, rfc, cuenta, CONCAT(rfc, acreedor, nombre, rfc, cuenta) as complemento FROM proveedores WHERE acreedor like '%$value%' OR nombre like '%$value%' OR rfc like '%$value%' ";
        $res = $this->EjecutarConsulta($sql);
        $filas = array();
        while($fila = mysql_fetch_assoc($res)) {
            $filas[] = $fila;
        }
        return $filas;
    }

}
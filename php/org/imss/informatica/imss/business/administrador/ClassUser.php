<?php
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector.php");
include_once(dirname(__FILE__)."/../../commons/class_utils.php");

class ClassUser extends  class_mysqlconnector
{

    private $dtcUsuarios = array();

    public function getDtcUsuarios()
    {
        return $this->dtcUsuarios;
    }
    public function setDtcUsuarios()
    {


        $this->dtcUsuarios = array (
            array("nombre"=>"id",           "tipo"=> Utils::$TIPO_NUMERO),
            array("nombre"=>"nombre",       "tipo"=> Utils::$TIPO_TEXTO),
            array("nombre"=>"contrasena",   "tipo"=> Utils::$TIPO_TEXTO),
            array("nombre"=>"matricula",    "tipo"=> Utils::$TIPO_TEXTO),
            array("nombre"=>"tipo",         "tipo"=> Utils::$TIPO_TEXTO),
            array("nombre"=>"idunidad",     "tipo"=> Utils::$TIPO_NUMERO),
            array("nombre"=>"idcategoria",  "tipo"=> Utils::$TIPO_NUMERO),
            array("nombre"=>"subcategoria", "tipo"=> Utils::$TIPO_TEXTO),           
            array("nombre"=>"esCDI",        "tipo"=> Utils::$TIPO_TEXTO),
            array("nombre"=>"esCOORDINAD",  "tipo"=> Utils::$TIPO_TEXTO)

        );


    }

    
    public function getUsuariosByDataTable($draw, $columns, $order, $start, $length, $search) {

        $cols = "";
        foreach($this->dtcUsuarios as $col) {
            $cols.= ( $cols ? "," : "" ).$col["nombre"];
        }
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $where = Utils::getComplementDataTableQuery($this->dtcUsuarios, $columns, $order, 0, -1, $search);
        $sql = "SELECT count(*) FROM usuario WHERE 1 ".$where;
        $res = $this->EjecutarConsulta($sql);
        $total = mysql_result($res, 0,0);

        $where = Utils::getComplementDataTableQuery($this->dtcUsuarios, $columns, $order, $start, $length, $search);

        $sql = "SELECT $cols FROM usuario WHERE 1 ".$where;
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
    
    


    //Usuarios
    public function guardarUsuarios($usuario) {
        
        //Buscando el id de la unidad
        if (empty($usuario["unidad"]) || $usuario["unidad"] == "" || !isset($usuario['unidad'])) {
           $unidad = " ";
        }else{
           $this->setKey("nombre", $usuario["unidad"]);
           $unidad = $this->devuelve_fila_i("unidad"); 
        }
        
        if (empty($usuario["subunidad"]) || $usuario["subunidad"] == "" || !isset($usuario['subunidad'])) {
            $subunidad = " ";
        }else{
           $this->setKey("nombre", $usuario["subunidad"]);
           $subunidad = $this->devuelve_fila_i("unidad"); 
        }

        //Obtnemos la subcategoria
        if (empty($usuario["subcategoria"]) || $usuario["subcategoria"] == "" || !isset($usuario['subcategoria'])) {
            $subCat = " ";
        }else{
            $this->setKey("nombre", $usuario["subcategoria"]);
            $subCat = $this->devuelve_fila_i("categoriau");
        }

        

        //Encriptando la contraseña
         $contra = md5($usuario['contrasena']);
       
        //Buscando el id de categoria
        $this->setKey("nombre", $usuario["categoria"]);
        $cat = $this->devuelve_fila_i("categoriau");
      
       

        $this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("id", $usuario["id"]);
        $find = $this->devuelve_fila_i("usuario");
        if($find) {
            $this->setKey("id", $usuario["id"]);
            $this->setValue("nombre", $usuario["nombre"]);

            if (isset($usuario['contrasena'])) { 
                $this->setValue("contrasena", $contra);
            }
            $this->setValue("matricula",    $usuario["matricula"]);
            $this->setValue("tipo",         $usuario["tipo"]);
            $this->setValue("idunidad",     $unidad['id']);
            $this->setValue("idSubUnidad",  $subunidad['id']);
            $this->setValue("idcategoria",  $cat['id']);
            $this->setValue("subcategoria", $subCat['id']);
            $this->setValue("esCDI",        $usuario["esCDI"]);
            $this->setValue("esCOORDINAD",  $usuario["escoordinador"]);
            $this->IniciarTransaccion();
            $update = $this->actualizar("usuario");
            if($update and $cat and $subCat and $unidad){
                $this->CometerTransaccion();
                return true;
            }

        } else {
            $this->setValue("nombre", $usuario["nombre"]);
            $this->setValue("contrasena", $contra);
            $this->setValue("matricula", $usuario["matricula"]);
            $this->setValue("tipo", $usuario["tipo"]);
            $this->setValue("idunidad", $unidad['id']);
            $this->setValue("idSubUnidad", $subunidad['id']);
            $this->setValue("idcategoria", $cat['id']);
            $this->setValue("subcategoria", $subCat['id']);
            $this->setValue("esCDI", $usuario["esCDI"]);
            $this->setValue("esCOORDINAD", $usuario["escoordinador"]);
            $this->IniciarTransaccion();
            $insert = $this->insertar("usuario");
            if($insert and $cat and $subCat and $unidad) {
                $this->CometerTransaccion();
                return true;
            }
        }
        $this->DeshacerTransaccion();
        return false;
    }

    public function findUserById($id) {
        $sql = "SELECT 
                us.id,
                us.nombre,
                us.matricula,
                us.tipo,
                cu.nombre as categoria,
                cus.nombre as subcategoria,
                u.nombre as unidad,
                un.nombre as subunidad,
                us.esCDI,
                us.esCOORDINAD as escoordinador
                FROM usuario as us
                LEFT JOIN unidad as u ON (us.idunidad = u.id )
                LEFT JOIN unidad as un ON (us.idSubUnidad = un.id )
                LEFT JOIN categoriau as cu ON (us.idcategoria = cu.id )
                LEFT JOIN categoriau as cus ON (us.subcategoria = cus.id )
                WHERE us.id = {$id}";     
            
        try{
            $res = $this->EjecutarConsulta($sql);
        }catch (Exception $e){
            throw $e;
        }

        
       $fila = @mysql_fetch_assoc($res);
       return $fila;
         
        
    }

    public function autoUnidades ()
    {
        $data = $this->devuelve_filas_indexlabel("unidad", "id, nombre");
        return $data;
    }

    public function deleteUser($id) {
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("id", $id);
        $find = $this->devuelve_fila_i("usuario");

        if($find) {
           
            $this->IniciarTransaccion();
            $this->setKey("id", $id);
            $delete = $this->eliminar("usuario");

            if($delete){
               
                $this->CometerTransaccion();
                return true;
            }
        }
        $this->DeshacerTransaccion();
        return false;
    }


}
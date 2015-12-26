<?php
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector.php");
include_once(dirname(__FILE__)."/../../commons/class_utils.php");

class ClassAviso extends  class_mysqlconnector
{
    public function get_aviso_id($id) {
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("id", $id);
        $fila = $this->devuelve_fila_i("aviso");
        if($fila) {
            return $fila;
        }
        return array();
    }

    public function delete_aviso($id) {
        echo "id: ".$id;
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("id", $id);
        $find = $this->devuelve_fila_i("aviso");
        if($find) {
            $this->IniciarTransaccion();
            $this->setKey("id", $id);
            if($this->eliminar("aviso")){
                $this->CometerTransaccion();
                return true;
            }
        }
       $this->DeshacerTransaccion();
        return false;
    }

    public function save_aviso($data, $img) {
       
           

        $this->setKey("id", $data["id"]);
        $find = $this->devuelve_fila_i("aviso");
        if($find) {

            $this->setKey("id",          $data["id"]);
            $this->setValue("aviso",     $data["aviso"]);
            $this->setValue("tipo_aviso",$data["tipo_aviso"]); 
            $this->setValue("tipo_img",  $data["tipo"]);
            $this->setValue("titulo",    $data["titulo"]);
            $this->setValue("imagen",    $img);

            $this->IniciarTransaccion();
            if($this->actualizar("aviso")){
                $this->CometerTransaccion();
                return true;
            }
        } else {

            $this->setValue("aviso",     $data["aviso"]);
            $this->setValue("tipo_aviso",$data["tipo_aviso"]); 
            $this->setValue("tipo_img",  $data["tipo"]);
            $this->setValue("titulo",  $data["titulo"]);
            $this->setValue("imagen",    $img);

           
            $this->IniciarTransaccion();
            if($this->insertar("aviso")) {
                $this->CometerTransaccion();
                return true;
            }
        }
        $this->DeshacerTransaccion();
        return false;
    }

    public function get_avisos(){

        $sql  = "SELECT * FROM aviso";           
        $res = $this->EjecutarConsulta($sql);
      
        $k = 0;
        while($fila = @mysql_fetch_assoc($res)){  
            $valores[$k++] = $fila;  
           // $valores["prueba"] = html_entity_decode($fila["aviso"]); 

         }
       
        if(isset($valores)) return $valores;

    }

}
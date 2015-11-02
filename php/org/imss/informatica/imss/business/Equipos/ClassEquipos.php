<?php
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector.php");

class ClassEquipos extends class_mysqlconnector
{
    private $array;
    
    public function getReporte()
    { return $this->$array; }

  
    public function setReporte($array)
    { $this->array = $array;}



    public function getIP($ip)
    {
        print_r("SELECT CURDATE()");
        $this->setKey("IP", $ip);
        $arreglo = $this->devuelve_filas_indexlabel("reporte_equipos");
        if(is_array($arreglo)){
            return $arreglo[0];
        }
        else{
            return array();
        }

    }



    public function saveReporteAutocomplete($array)
    {
        //print_r($array);

        $this->IniciarTransaccion();
         //Tabla Reporte
        $this->setValue("fechaRecep", date("Y-m-d"));
        $this->setValue("horaRecep", date("H:i:s"));
        $this->setValue("ipcaptura", $array["IPADDRESS"]);
        $this->setValue("id_unidad", "5"); //Falta que lo busque en la tabla  unidad         
        $this->setValue("idarea", "5"); //Falta que lo busque en la tabla area
        $this->setValue("personaquereporta", $array["Qreporta"]);
        $this->setValue("problema", $array["problema"]);
        $this->setValue("telefono", $array["telefono"]);
        $this->setValue("extencion", $array["extencion"]);
        $this->setValue("correo", $array["correo"]);
        $this->setValue("contraCorreo", $array["passCorreo"]);      
        $T_reporte = $this->insertar("reporte");

      
       
        $sql= "SELECT id FROM reporte ORDER BY id DESC LIMIT 1 ";
        $res = $this->EjecutarConsulta($sql);
        $reporte_id= @mysql_fetch_assoc($res);
        echo $reporte_id["id"];

       //Insertamos el folio automatico
       $folio = "E15-".$reporte_id["id"];
       print_r($folio);
       $this->setKey("id", $reporte_id["id"]);
       $this->setValue("folio", $folio);
       $rep_update = $this->actualizar("reporte");


     
     

        //Tabla atencionreportes
        $this->setValue("idreporte", $reporte_id["id"]);
        $this->setValue("idstatus", "6");
        $atencion_reporte = $this->insertar("atencionreportes");

        //Tabla Equipo ReportadoS             
        $this->setValue("idreporte",   $reporte_id["id"]);
        $this->setValue("cuenta",      $array["usuario"]);
        $this->setValue("contrasena",  $array["passUser"]);
        $this->setValue("idmarca",     5);
        $this->setValue("modelo",    $array["SMODEL"]);
        $this->setValue("mac",         $array["MACADDR"]);
        $eq_r = $this->insertar("equiporep");
      

       

        //Tabla Equipos
        $this->setValue("idtipo", "5");//Buscar en la tabla_tipo
        $this->setValue("idmarca", "5");//Mismo problema como en le anterior
        $this->setValue("modelo", $array['SMODEL']);
        $this->setValue("numdeserie", $array['ASSETTAG']);
        $this->setValue("etiqueta", "no definido");
         $tabla_equipos = $this->insertar("equipos");

        

        $sql= "SELECT id FROM equipos ORDER BY id DESC LIMIT 1 ";
        try{
            $res = $this->EjecutarConsulta($sql);
        }catch (Exception $e){
            throw $e;
        }

        $equipo_id= @mysql_fetch_assoc($res);


       
        //Guardamos en la tabla equipos recibidos
        $this->setValue("idequipo",  $equipo_id["id"]);
        $this->setValue("idreporte", $reporte_id["id"]);
        $equipos_recibidos = $this->insertar("equiposrecibidos");
      

        if($T_reporte and $rep_update and $eq_r and $atencion_reporte and $tabla_equipos and $equipos_recibidos)
        {
            print_r("Transaccion completa");
            $this->CometerTransaccion();
            return true;     
            
        }
        $this->DeshacerTransaccion();
        return false;
       
    }
}
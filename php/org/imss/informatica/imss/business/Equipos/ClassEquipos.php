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
        $folio = "E15";
        $this->IniciarTransaccion();
        $this->setValue("ipcaptura", $array["IPADDRESS"]);
        $this->setValue("id_unidad", "5"); //Falta que lo busque en la tabla  unidad
        $this->setValue("idarea", "5"); //Falta que lo busque en la tabla area
        $this->setValue("personaquereporta", $array["Qreporta"]);
        $this->setValue("problema", $array["problema"]);
        $this->setValue("telefono", $array["telefono"]);
        $this->setValue("extencion", $array["extencion"]);
        $this->setValue("correo", $array["correo"]);
        $this->setValue("folio", $folio);
        $this->setValue("fechaEnt","CURDATE()");
        $this->setValue("horaEnt", "CURTIME()");
        $T_reporte = $this->insertar("reporte");

        $reporte_id =$this->devuelve_filas_indexlabel("reporte","id","order by id desc LIMIT 1");
       
        $this->setValue("idreporte", $reporte_id['id']);
        $this->setValue("ipcaptura", $array["IPADDRESS"]);
        $telecom = $this->insertar("telecom");

        $this->setValue("idreporte", $reporte_id['id']);
        $this->setValue("ipusuario", $array["IPADDRESS"]);
        $this->setValue("idaplicativo", $array["1"]);
        $sistemasrep = $this->insertar("sistemasrep");

        $this->setValue("idreporte", $reporte_id['id']);
        $this->setValue("ip", $array["IPADDRESS"]);
        $this->setValue("idmarca", $array['1']);
        $telecom = $this->insertar("impresorarep");

        $this->setValue("idreporte", $reporte_id['id']);
        $this->setValue("cuenta", $array['usuario']);
        $this->setValue("contraseña", $array['usuario_pw']);
        $this->setValue("idmarca", $array["5"]);
        $this->setValue("idmodelo", $array["modelo"]);
        $equipo_rep = $this->insertar("equiporep");

        $this->setValue("idreporte", $reporte_id['id']);
        $this->setValue("idstatus", $array['6']);
        $atencion_reporte = $this->insertar("atencionreporte");

        $this->setValue("idequipo", $array['5']);
        $this->setValue("idreporte", $reporte_id['id']);
        $equipos_recibidos = $this->insertar("equiposrecibidos");

        if($T_reporte and $equipo_rep and $atencion_reporte and $equipos_recibidos){
            $this->CometerTransaccion();
            return true;
        }
        $this->DeshacerTransaccion();
        return false;
       
    }
}
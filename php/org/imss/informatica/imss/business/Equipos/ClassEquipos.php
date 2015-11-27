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
        $this->IniciarTransaccion();
         //Tabla Reporte

        #====== Tabla area =====
        $this->setValue("nombre", $array['AREA']);
        $insert_area= $this->insertar("area");

        #==== id_unidad ====
        $nombre_unidad = $array['unidad'];
        $this->setKey("nombre", $nombre_unidad);
        $id_unidad= $this->devuelve_filas_indexlabel("unidad","id");

        #==== id_area ====
        $sql = "SELECT id FROM area ORDER BY id DESC LIMIT 1 ";
        $consulta = $this->EjecutarConsulta($sql);
        $id_area = @mysql_fetch_assoc($consulta);

        $this->setValue("fechaRecep", date("Y-m-d"));
        $this->setValue("horaRecep", date("H:i:s"));
        $this->setValue("ipcaptura", $array["IP"]);
        $this->setValue("id_unidad", $id_unidad[0]['id']); //Falta que lo busque en la tabla  unidad
        $this->setValue("idarea", $id_area['id']); //Falta que lo busque en la tabla area
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
        //echo $reporte_id["id"];

       //Insertamos el folio automatico
       $folio = "E15-".$reporte_id["id"];
       //print_r($folio);
       $this->setKey("id", $reporte_id["id"]);
       $this->setValue("folio", $folio);
       $rep_update = $this->actualizar("reporte");

        //Tabla atencionreportes
        $this->setValue("idreporte", $reporte_id["id"]);
        $this->setValue("idstatus", "6");
        $atencion_reporte = $this->insertar("atencionreportes");

        #==== id_marca =====
        $nombre_marca = $array['marca'];
        $this->setKey("descripcion", $nombre_marca);
        $id_marca = $this->devuelve_filas_indexlabel("marca","id");


        //Tabla Equipo ReportadoS             
        $this->setValue("idreporte",   $reporte_id["id"]);
        $this->setValue("cuenta",      $array["USERID"]);
        $this->setValue("contrasena",  $array["passUser"]);
        $this->setValue("idmarca",     $id_marca[0]['id']);
        $this->setValue("modelo",    $array["SMODEL"]);
        $this->setValue("mac",         $array["MACADDR"]);
        $eq_r = $this->insertar("equiporep");

        #==== id_tipo =====
        $nombre_tipo = $array['Tipo'];
        $this->setKey("descripcion", $nombre_tipo);
        $id_tipo = $this->devuelve_filas_indexlabel("tipo","id");

        //Tabla Equipos
        $this->setValue("idtipo", $id_tipo[0]['id']);//Buscar en la tabla_tipo
        $this->setValue("idmarca", $id_marca[0]['id']);//Mismo problema como en le anterior
        $this->setValue("modelo", $array['SMODEL']);
        $this->setValue("numdeserie", $array['ASSETTAG']);
        $this->setValue("etiqueta", "no definido");
        $this->setValue("id_reporte", $reporte_id["id"]);
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
      

        if($T_reporte and $rep_update and $eq_r and $atencion_reporte and $tabla_equipos and $equipos_recibidos and $insert_area)
        {
            //print_r("Transaccion completa");
            $this->CometerTransaccion();

            
        }
        $this->DeshacerTransaccion();
        return $reporte_id;
       
    }

    public function saveReporte($array)
    {
        $this->IniciarTransaccion();
        //Tabla Reporte

        #====== Tabla area =====
        $this->setValue("nombre", $array['AREA']);
        $insert_area= $this->insertar("area");

        #==== id_unidad ====
        $nombre_unidad = $array['unidad'];
        $this->setKey("nombre", $nombre_unidad);
        $id_unidad= $this->devuelve_filas_indexlabel("unidad","id");

        #==== id_area ====
        $sql = "SELECT id FROM area ORDER BY id DESC LIMIT 1 ";
        try{
            $consulta = $this->EjecutarConsulta($sql);
        }catch (Exception $e){
            throw $e;
        }
        $id_area = @mysql_fetch_assoc($consulta);
        //echo($id_area['id']);

        $this->setValue("fechaRecep", date("Y-m-d"));
        $this->setValue("horaRecep", date("H:i:s"));
        $this->setValue("ipcaptura", $array["IPADDRESS"]);
        $this->setValue("id_unidad", $id_unidad[0]['id']); //Falta que lo busque en la tabla  unidad
        $this->setValue("idarea", $id_area['id']); //Falta que lo busque en la tabla area
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
        //echo $reporte_id["id"];

        //Insertamos el folio automatico
        $folio = "E15-".$reporte_id["id"];
        //print_r($folio);
        $this->setKey("id", $reporte_id["id"]);
        $this->setValue("folio", $folio);
        $rep_update = $this->actualizar("reporte");

        //Tabla atencionreportes
        $this->setValue("idreporte", $reporte_id["id"]);
        $this->setValue("idstatus", "6");
        $atencion_reporte = $this->insertar("atencionreportes");

        #==== id_marca =====
        $nombre_marca = $array['marca'];
        $this->setKey("descripcion", $nombre_marca);
        $id_marca = $this->devuelve_filas_indexlabel("marca","id");


        //Tabla Equipo ReportadoS
        $this->setValue("idreporte",   $reporte_id["id"]);
        $this->setValue("cuenta",      $array["USERID"]);
        $this->setValue("contrasena",  $array["passUser"]);
        $this->setValue("idmarca",     $id_marca[0]['id']);
        $this->setValue("modelo",    $array["SMODEL"]);
        $this->setValue("mac",         $array["MACADDR"]);
        $eq_r = $this->insertar("equiporep");

        #==== id_tipo =====
        $nombre_tipo = $array['Tipo'];
        $this->setKey("descripcion", $nombre_tipo);
        $id_tipo = $this->devuelve_filas_indexlabel("tipo","id");

        //Tabla Equipos
        $this->setValue("idtipo", $id_tipo[0]['id']);//Buscar en la tabla_tipo
        $this->setValue("idmarca", $id_marca[0]['id']);//Mismo problema como en le anterior
        $this->setValue("modelo", $array['SMODEL']);
        $this->setValue("numdeserie", $array['ASSETTAG']);
        $this->setValue("etiqueta", "no definido");
        $this->setValue("id_reporte", $reporte_id["id"]);
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


        if($T_reporte and $rep_update and $eq_r and $atencion_reporte and $tabla_equipos and $equipos_recibidos and $insert_area)
        {
            //print_r("Transaccion completa");
            $this->CometerTransaccion();
            //echo $reporte_id;


        }
        $this->DeshacerTransaccion();
        return $reporte_id;

    }

    public function verReporte(){
        $nombre_unidad = "LG";
        $this->setKey("descripcion", $nombre_unidad);
        $unidad= $this->devuelve_filas_indexlabel("marca","id");

        if(is_array($unidad))
        {
            return $unidad[0]['id'];
        }else{
            return array();
        }
    }
    public function TraeReporteGuardado($id){
        //print_r($id);
        $this->setKey("id", $id);

        $sql = "SELECT reporte.ipcaptura, reporte.fechaRecep, reporte.folio, reporte.problema, unidad.nombre,area.nombre,
                equipos.modelo, equipos.numdeserie,tipo.descripcion, marca.descripcion FROM reporte
                JOIN unidad ON reporte.id_unidad = unidad.id
                JOIN area ON reporte.idarea = area.id
                JOIN equipos ON reporte.id = equipos.id_reporte
                JOIN tipo ON equipos.idtipo = tipo.id
                JOIN marca ON equipos.idmarca = marca.id
                WHERE reporte.id = '$id' AND reporte.id_unidad = unidad.id AND reporte.idarea = area.id
                AND (equipos.id_reporte = '$id') AND (equipos.idtipo = tipo.id) AND (equipos.idmarca = marca.id)";

        try
        {
            $res= $this->EjecutarConsulta($sql);
        }catch (Exception $e){
            throw $e;
        }
        return $arreglo2 = @mysql_fetch_assoc($res);
        if(is_array($arreglo2))
        {
            return (print_r(json_encode($arreglo2)));
        }else{
            return array();
        }
    }
}
$reporte= new ClassEquipos();
$id= $_GET['id'];
return (json_encode($reporte->TraeReporteGuardado($id)));

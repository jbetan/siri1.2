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
        $this->setValue("numdeserie", $array['SSN']);
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
        $this->setValue("nombre", $array['areas']);
        $insert_area= $this->insertar("area");

        #==== id_unidad ====
        $nombre_unidad = $array['unidades'];
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
        $this->setValue("ipcaptura", $array["ipcaptura"]);
        $this->setValue("id_unidad", $id_unidad[0]['id']); //Falta que lo busque en la tabla  unidad
        $this->setValue("idarea", $id_area['id']); //Falta que lo busque en la tabla area
        $this->setValue("personaquereporta", $array["persona_reporta"]);
        $this->setValue("problema", $array["problema_select"]);
        $this->setValue("telefono", $array["telefono"]);
        $this->setValue("extencion", $array["extencion"]);
        $this->setValue("correo", $array["correo"]);
        $this->setValue("contraCorreo", $array["correo_pw"]);
        $T_reporte = $this->insertar("reporte");

        $sql= "SELECT id FROM reporte ORDER BY id DESC LIMIT 1 ";
        $res = $this->EjecutarConsulta($sql);
        $reporte_id= @mysql_fetch_assoc($res);
        //echo $reporte_id["id"];

        //Insertamos el folio automatico
        $folio = "E".date("y")."-".$reporte_id["id"];
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
        $this->setValue("cuenta",      $array["usuario"]);
        $this->setValue("contrasena",  $array["usuario_pw"]);
        $this->setValue("idmarca",     $id_marca[0]['id']);
        $this->setValue("modelo",    $array["modelo"]);
        $this->setValue("mac",         $array["serie"]);
        $eq_r = $this->insertar("equiporep");

        #==== id_tipo =====
        $nombre_tipo = $array['tipo'];
        $this->setKey("descripcion", $nombre_tipo);
        $id_tipo = $this->devuelve_filas_indexlabel("tipo","id");

        //Tabla Equipos
        $this->setValue("idtipo", $id_tipo[0]['id']);//Buscar en la tabla_tipo
        $this->setValue("idmarca", $id_marca[0]['id']);//Mismo problema como en le anterior
        $this->setValue("modelo", $array['modelo']);
        $this->setValue("numdeserie", $array['serie']);
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

    public function validate($data){

        $unidad             = array();
        $tipo               = array();
        $marca              = array();
        $validate           = array();

        $arreglo = $this->devuelve_filas_indexlabel("unidad", "nombre");        //unidades
        $arreglo2 = $this->devuelve_filas_indexlabel("tipo", "descripcion");    //tipo
        $arreglo3 = $this->devuelve_filas_indexlabel("marca", "descripcion");   //marca

        foreach($arreglo as $array){
            foreach($array as $array_unidad){
                $unidad[] = $array_unidad;
            }
        }

        foreach($arreglo2 as $array2){
            foreach($array2 as $array_tipo){
                $tipo[] = $array_tipo;
            }
        }

        foreach($arreglo3 as $array3){
            foreach($array3 as $array_marca){
                $marca[] = $array_marca;
            }
        }
        //if(is_array($data)){
         //   if()
            if( in_array($data['unidades'], $unidad) &&
                in_array($data['tipo'], $tipo)       &&
                in_array($data['marca'], $marca)     &&
                $data['areas'] != ""                 &&
                $data['usuario'] != ""               &&
                $data['telefono'] != ""              &&
                $data['persona_reporta'] != ""       &&
                $data['problema_select'] != ""

                ){
                //print_r($data);
                $save = $this->saveReporte($data);
                return $save;
            }else{
                #========== AUTOCOMPLETE VALIDATE ==========
                if(!in_array($data['unidades'], $unidad)){
                    $no_unidad = array("unidad" => "undefined unidad");
                    $validate[] = $no_unidad;
                }
                if(!in_array($data['tipo'], $tipo)){
                    $no_tipo = array("tipo" => "undefined tipo");
                    $validate[] = $no_tipo;
                }
                if(!in_array($data['marca'], $marca)){
                    $no_marca = array("marca" => "undefined marca");
                    $validate[] = $no_marca;
                }
                #============= FORM VALIDATE ==============
                if($data['areas'] == ""){
                    $no_areas = array("areas" => "undefined areas");
                    $validate[] = $no_areas;
                }
                if($data['usuario'] == ""){
                    $no_usuario = array("usuario" => "undefined usuario");
                    $validate[] = $no_usuario;
                }
                if($data['telefono'] == ""){
                    $no_telefono = array("telefono" => "undefined telefono");
                    $validate[] = $no_telefono;
                }
                if($data['persona_reporta'] == ""){
                    $no_persona_reporta = array("persona_reporta" => "undefined persona_reporta");
                    $validate[] = $no_persona_reporta;
                }
                if($data['problema_select'] == ""){
                    $no_problema_select = array("problema_select" => "undefined problema_select");
                    $validate[] = $no_problema_select;
                }

                return $validate;
            }
//        }





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
if($_GET['id']){
    $id= $_GET['id'];
    return (json_encode($reporte->TraeReporteGuardado($id)));
}else if($_GET['action'] == "save"){
    $datas = $_POST;
    $response = $reporte->validate($datas);
    exit(json_encode($response));
    //print_r($datas);
}



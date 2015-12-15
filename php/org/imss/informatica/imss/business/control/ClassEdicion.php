<?php
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector.php");
include_once(dirname(__FILE__)."/../../commons/class_utils.php");

class ClassEdicion extends  class_mysqlconnector
{


    //$_SESSION["imss"]["niv_usuario"]
    
    public function autoNombre(){
        $this ->EjecutarConsulta("SET NAMES 'utf8';");
        $data = $this->devuelve_filas_indexlabel("usuario", "nombre");
        return $data;
    }

    public function auto(){
        $this ->EjecutarConsulta("SET NAMES 'utf8';");
        $data = $this->devuelve_filas_indexlabel("reporte", "id");
        return $data;
    }

    public function getFolioEdit(){
        
        $sql = "SELECT r.folio ";
        $sql .="from reporte as r ";
        $sql .="JOIN atencionreportes as at  ON r.id = at.idreporte ";
        $sql .="where at.idstatus != 6 and at.idstatus != 3 and at.idstatus != 4 ";    
       
        try{
            $res = $this->EjecutarConsulta($sql);
        }catch (Exception $e){
            throw $e;
        }

        $k = 0;
        while($fila = @mysql_fetch_assoc($res)){  
            $valores[$k++] = $fila;                       
        }
       
        if(isset($valores)) return $valores;

    }

    public function guardarReporte_no ($reporte){
        return true;
    }

    public function guardarReporte ($reporte){
        
        $this->IniciarTransaccion();
      
        //Comparamos si el equipo fue reparado si fue reaparado entra en el if.
        if(strcmp($reporte["solucionado"], "SI") == 0){
            
            $time = time();
            $hora= date("H:i:s",$time);
            $fecha = date("j-m-y");                   

            //actualizamos la tabla atencion reportes
            $this->setKey("nombre", $reporte["status"]);
            $status= $this->devuelve_fila_i("status");                 
      

            $this->setKey("id",                $reporte["idat"]);
            $this->setKey("idreporte",         $reporte["idr"]);
            $this->setValue("idstatus",        $status ['id']);
            $this->setValue("fechaTerm",       $fecha);
            $this->setValue("horaTerm",        $hora);
            $this->setValue("solucionado",     $reporte["solucionado"]);                    
            $updateAT =$this->actualizar("atencionreportes");

            //Insertamos en la tabla historialatencion
            $this->setValue("idreporte",          $reporte["idr"]);
            $this->setValue("idatencionreportes", $reporte["idat"]);
            $this->setValue("idactividad_uno",    $reporte["actividad_uno"]);
            $this->setValue("idactividad_dos",    $reporte["actividad_dos"]);
            $this->setValue("idactividad_tres",   $reporte["actividad_tres"]);
            $this->setValue("comentario",         $reporte["comentario"]);
            $insert_ha = $this->insertar("historialatencion");

            if($updateAT AND $insert_ha){
                $this->CometerTransaccion();
                return true;
            }      
           
        }else{
            /*Cambiamos el usuario actual por el usuario escalado*/
            $this->setKey("id",            $reporte["idr"]);
            $this->setValue("idusuario",   $reporte["usuarioD_id"]);
            $update_report =$this->actualizar("reporte");


            //actualizamos la tabla atencion reportes
            $this->setKey("nombre", $reporte["status"]);
            $status= $this->devuelve_fila_i("status");                 
      

            $this->setKey("id",                $reporte["idat"]);
            $this->setKey("idreporte",         $reporte["idr"]);
            $this->setValue("idstatus",        $status ['id']);
            $this->setValue("solucionado",     $reporte["solucionado"]);
            $this->setValue("idusuarioOrigen", $reporte['idusuario']);
            $this->setValue("idusuarioDestino",$reporte['usuarioD_id']);                         
            $updateAT =$this->actualizar("atencionreportes");

            //Insertamos en la tabla historialatencion
            $this->setValue("idreporte",          $reporte["idr"]);
            $this->setValue("idatencionreportes", $reporte["idat"]);
            $this->setValue("idactividad_uno",    $reporte["actividad_uno"]);
            $this->setValue("idactividad_dos",    $reporte["actividad_dos"]);
            $this->setValue("idactividad_tres",   $reporte["actividad_tres"]);
            $this->setValue("comentario",         $reporte["comentario"]);
            $insert_ha = $this->insertar("historialatencion");

            if($updateAT AND $insert_ha AND $update_report){
                $this->CometerTransaccion();
                return true;
            }                                     
        }

        $this->DeshacerTransaccion();
        return false; 
        
    }

    public function findUsuarioByLevel($nivel, $subnivel) {
       session_start();
       $niv = $_SESSION["imss"]["nivel"];

       if ($niv == 0 or $niv == 7) {
          $niv = 2;
       }
            
       $sql="SELECT
             u.id,
             u.nombre
             From usuario as u
             LEFT JOIN categoriau as cu ON u.idcategoria = cu.id
             WHERE cu.nivel >= $niv and cu.nivel != 7 and cu.nivel != 6
       ";

       try{
            $res = $this->EjecutarConsulta($sql);
        }catch (Exception $e){
            throw $e;
        }

        $k = 0;
        while($fila = @mysql_fetch_assoc($res)){  
            $valores[$k++] = $fila;                       
         }
       
        if(isset($valores)) return $valores;
    }
    


    public function findActivities() {
        $sql = "SELECT * ";
        $sql .="from actividades ";
   
           
       
        try{
            $res = $this->EjecutarConsulta($sql);
        }catch (Exception $e){
            throw $e;
        }

        $k = 0;
        while($fila = @mysql_fetch_assoc($res)){  
            $valores[$k++] = $fila;                       
        }
       
        if(isset($valores)) return $valores;
    }

    public function getReporteByFolio($folio) {
      
        $sql = "SELECT 
            r.id as idr, 
            r.personaquereporta,        
            r.ipcaptura, 
            r.folio, 
            r.fechaRecep as finicio, 
            r.idusuario,  
            r.prioridad, 
            r.problema, 
            at.id as idat,
            at.fechaTerm as ftermino,
            a.nombre as area, 
            u.nombre as unidad,
            e.modelo, 
            e.numdeserie as serie,
            m.descripcion as marca, 
            tp.descripcion,  
            st.nombre as status,            
            tr.nombretipo,        
            cl.descripcion as claseTipo,
            tr.nombreTipo,
            us.nombre,
            cu.nivel as nivel_usuario,
            scu.nivel as subnivel_usuario            
            FROM reporte as r 
            JOIN atencionreportes as at  ON r.id = at.idreporte 
            JOIN area as a               ON r.idarea = a.id 
            JOIN unidad as u             ON r.id_unidad = u.id              
            JOIN equipos as e            ON r.id = e.id_reporte 
            JOIN status as st            ON at.idstatus = st.id 
            JOIN marca as m              ON e.idmarca = m.id 
            JOIN tipo as tp              ON e.idtipo = tp.id 
            JOIN usuario as us           ON r.idusuario = us.id 
            JOIN tiporeporte as tr       ON r.idtiporeporte = tr.id 
            JOIN clase as cl             ON r.idClase = cl.id 
            JOIN categoriau as cu        ON us.idcategoria = cu.id
            JOIN categoriau as scu       ON us.subcategoria = scu.id  
            WHERE 
                r.folio = '{$folio}'  and
                at.idstatus != 6  and
                at.idstatus != 3  
                LIMIT 1
        ";

        try{
            $res = $this->EjecutarConsulta($sql);
        }catch (Exception $e){
            throw $e;
            $fila['status'] = "ERROR";
            $fila['message'] = "Error en la base de datos <br/>".$e;
            return $fila;
        }

        $fila = @mysql_fetch_assoc($res);

        if(!$fila) {
             $fila['status'] = "ERROR";
             $fila['message'] = "El folio ingresado no es correcto o el estatus del reportes es Listo";
             return $fila;
        }

        if($fila) {
            $fila['message'] = "El reporte fue encontrado";
            return $fila;
        }
        return array();

    }


/*=====================================
 *      Empieza modulo de Activos
 *=====================================
 */ 
    public function getReportes() {

        $sql = "select r.id as idr, r.folio, r.personaquereporta,  r.prioridad,  r.problema, ";
        $sql .="st.nombre as status,  r.fechaRecep as finicio,  at.fechaTerm as ftermino, ";
        $sql .="u.nombre as unidad,  a.nombre as area,  e.modelo,  e.numdeserie as serie, ";
        $sql .="m.descripcion as marca,  tp.descripcion, usr.nombre, us.nombre as tecnicoAnterior ";
        $sql .="from reporte as r ";
        $sql .="JOIN atencionreportes as at  ON r.id = at.idreporte ";
        $sql .="JOIN area as a    ON r.idarea = a.id ";
        $sql .="JOIN unidad as u  ON r.id_unidad = u.id ";
        $sql .="JOIN equiposrecibidos as er ON r.id = er.idreporte ";
        $sql .="JOIN equipos as e ON er.idequipo = e.id ";
        $sql .="JOIN marca as m   ON e.idmarca = m.id ";
        $sql .="JOIN tipo as tp   ON e.idtipo = tp.id ";
        $sql .="JOIN status as st ON at.idstatus = st.id ";
        $sql .="JOIN usuario as us  ON at.idusuarioOrigen = us.id ";
        $sql .="JOIN usuario as usr  ON r.idusuario = usr.id ";
        // $sql .="where at.idstatus != 6 ";
        $sql .= "ORDER BY r.folio DESC, idr DESC " ;
        //$sql .= "ORDER BY status " ;



        try{
            $res = $this->EjecutarConsulta($sql);
        }catch (Exception $e){
            throw $e;
        }

        $k = 0;
        while($fila = @mysql_fetch_assoc($res)){  
            $valores[$k++] = $fila;                       
         }
       
        if(isset($valores)) return $valores;    

    }


}//Finaliza la clase Entrega


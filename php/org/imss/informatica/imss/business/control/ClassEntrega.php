<?php
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector.php");
include_once(dirname(__FILE__)."/../../commons/class_utils.php");

class ClassEntrega extends  class_mysqlconnector
{
    public function getFolioAutoEdicion()
    {
        
        $sql = "SELECT r.folio ";
        $sql .="from reporte as r ";
        $sql .="JOIN atencionreportes as at  ON r.id = at.idreporte ";
        $sql .="where at.idstatus = 3 ";
     
       
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


        public function auto()
    {
         $this ->EjecutarConsulta("SET NAMES 'utf8';");
         $data = $this->devuelve_filas_indexlabel("reporte", "folio");
         return $data;

    }


    public function guardarReporteEntrega ($reporte)
    {

        //Comparamos si el equipo nno ha sido entregado
        if(strcmp($reporte["status"], "Listo") != 0){
            return 3;
        }

        $time = time();
        $tim = date("H:i:s",$time);
        $fecha = date("y-m-j"); 
        $this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("id", $reporte["id"]);
        $findR = $this->devuelve_fila_i("reporte");
        $this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("idreporte", $reporte["id"]);
        $findAR = $this->devuelve_fila_i("atencionreportes");
        if($findR && $findAR) {

            $this->IniciarTransaccion();
            $this->setKey("id", $reporte["id"]);            
            $this->setValue("recibido", $reporte["recibido"]);
            $this->setValue("fechaEnt", $fecha);
            $this->setValue("horaEnt", $tim);
            $updateR = $this->actualizar("reporte");
			
			
            $this->setKey("idreporte",         $reporte["id"]);
            $this->setValue("idstatus",        4);                                
            $updateAT =$this->actualizar("atencionreportes");

            if($updateR and $updateAT){
                $this->CometerTransaccion();
                return 1;
            }
        }
        $this->DeshacerTransaccion();
        return 2;


    }     



    public function findReporteById($id) {

        $sql = "SELECT
        r.id, r.folio,
        st.nombre as status, 
        r.fechaRecep as finicio, 
        DATE_FORMAT(at.fechaTerm, '%d-%m-%Y') as ftermino, 
        u.nombre as unidad, 
        a.nombre as area,
        e.modelo, 
        e.numdeserie as serie, 
        m.descripcion as marca,
        tp.descripcion, 
        us.nombre as usuario       
        from reporte as r 
        JOIN atencionreportes as at  ON r.id = at.idreporte 
        JOIN area as a    ON r.idarea = a.id 
        JOIN unidad as u  ON r.id_unidad = u.id 
        JOIN equipos as e ON r.id = e.id_reporte 
        JOIN status as st ON at.idstatus = st.id 
        JOIN marca as m   ON e.idmarca = m.id 
        JOIN tipo as tp   ON e.idtipo = tp.id 
        JOIN usuario as us  ON at.idusuarioOrigen = us.id

        WHERE r.folio ='$id' and st.id = 3  LIMIT 1";

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
             $fila['message'] = "El folio ingresado no es correcto o el estatus del reportes no esta en  Listo";
             return $fila;
        }        

        if($fila) {
            $fila['message'] = "El reporte fue encontrado";
            return $fila;
        }
        return array();

    }

    public function consulta($id) {



        $sql = "SELECT
        r.id, 
        r.folio,
        st.nombre       AS statusrep, 
        r.fechaRecep    AS finicio, 
        DATE_FORMAT(at.fechaTerm, '%d-%m-%Y') AS ftermino, 
        u.nombre        AS unidad, 
        a.nombre        AS area,
        e.modelo, 
        e.numdeserie    AS serie, 
        m.descripcion   AS marca,
        tp.descripcion, 
        us.nombre       AS usuario,
        r.problema,
        at.solucionado,
        acu.descripcion  AS actividad_uno,
        acd.descripcion  AS actividad_dos,
        act.descripcion  AS actividad_tres
        FROM reporte  r 
        LEFT JOIN atencionreportes as at  ON r.id = at.idreporte 
        LEFT JOIN area             as a   ON r.idarea = a.id 
        LEFT JOIN unidad           as u   ON r.id_unidad = u.id 
        LEFT JOIN equipos          as e   ON r.id = e.id_reporte 
        LEFT JOIN status           as st  ON at.idstatus = st.id 
        LEFT JOIN marca            as m   ON e.idmarca = m.id 
        LEFT JOIN tipo             as tp  ON e.idtipo = tp.id 
        LEFT JOIN usuario          as us  ON at.idusuarioOrigen = us.id
        LEFT JOIN historialatencion as ht ON ht.idreporte = r.id  
        LEFT JOIN actividades      as acu  ON ht.idactividad_uno = acu.id
        LEFT JOIN actividades      as acd  ON ht.idactividad_dos = acd.id
        LEFT JOIN actividades      as act  ON ht.idactividad_tres = act.id        
        WHERE r.folio ='$id' ";

       // $sql = "SELECT * FROM reporte WHERE folio = '{$id}'";

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
             $fila['message'] = "El folio ingresado no es correcto o el estatus del reportes no esta en  Listo";
             return $fila;
        }        

        if($fila) {
             $fila['status'] = "OK";
            $fila['message'] = "El reporte fue encontrado";
            return $fila;
        }
        return array();

    }

}//Finaliza la clase Entrega


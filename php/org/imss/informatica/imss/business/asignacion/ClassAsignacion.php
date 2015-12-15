<?php
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector.php");
include_once(dirname(__FILE__)."/../../commons/class_utils.php");

class ClassAsignacion extends  class_mysqlconnector
{
    private $dtcReportes = array();

    public function autoNombre()
    {
        $this ->EjecutarConsulta("SET NAMES 'utf8';");
        $data = $this->devuelve_filas_indexlabel("usuario", "nombre");
        return $data;
    }

    public function getFolio()
    {   
        $sql  = "select ";
        $sql .= "folio ";
        $sql .="from reporte as r ";
        $sql .="JOIN atencionreportes as at  ON r.id = at.idreporte ";
        $sql .="WHERE at.idstatus = 6  ";      
            
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

    public function guardarReporte ($reporte)
    {
        $this->IniciarTransaccion();

        $this->setKey("nombre", $reporte["status"]);
        $status= $this->devuelve_fila_i("status");

        $this->setKey("descripcion", $reporte["clase"]);
        $clase= $this->devuelve_fila_i("clase");


        //------Sumamos contador a los usuarios
        if($reporte["idtec"] == 0){
            $suma = 0;
        }else{
            $suma = $reporte["valtec"] + 1;
        }
        
        $this->setKey("id", $reporte["idtec"]);
        $this->setValue("valor",$suma );
        $updateTec =$this->actualizar("usuario");

        //------Insertamos en la tabla Atencion Reportes
        $this->setKey("id", $reporte["idat"]);
        $this->setKey("idreporte", $reporte["idr"]);
        $this->setValue("idusuarioOrigen", $reporte["idtec"]);
        $this->setValue("idstatus", $status ['id']);
        $updateAT =$this->actualizar("atencionreportes");

        //------Insertamos en la tabla  Reportes
        $this->setKey("id", $reporte["idr"]);
        $this->setValue("idtiporeporte", $reporte["nombretipo"] );
        $this->setValue("idclase", $clase['id']);
        $this->setValue("idusuario", $reporte["idtec"]);
        $this->setValue("prioridad",$reporte["prioridad"] );
        $this->setValue("clasificacion",$reporte["clasificar"] );
        $updateRep =$this->actualizar("reporte");

        if($updateAT and $updateRep and $updateTec){
            $this->CometerTransaccion();
            return true;
        }


        $this->DeshacerTransaccion();
        return false;
    }


    public function findClase(){   
        $fila = $this->devuelve_filas_indexlabel("clase", "idTipoReporte, descripcion");
        if($fila) {
            return $fila;
        }
        return array();
    }


    public function findReporteById($id) {

        $sql = "SELECT 
               r.id as idr,
               r.personaquereporta, 
               r.id_unidad, at.id as idat, 
               r.ipcaptura, r.problema,
               r.folio, 
               r.fechaRecep as finicio,
               u.nombre as unidad, 
               a.nombre as area, 
               e.modelo, 
               e.numdeserie as serie, 
               m.descripcion as marca, 
               tp.descripcion 
            FROM reporte as r 
            JOIN atencionreportes as at  ON r.id = at.idreporte 
            JOIN area as a               ON r.idarea = a.id 
            JOIN unidad as u             ON r.id_unidad = u.id 
            JOIN equipos as e            ON r.id = e.id_reporte            
            JOIN marca as m              ON e.idmarca = m.id 
            JOIN tipo as tp              ON e.idtipo = tp.id      
            WHERE r.folio = '$id' AND  at.idstatus = 6 LIMIT 1";

        $res = $this->EjecutarConsulta($sql);
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
            $fila['message'] = "El folio ingresado no es correcto o el reporte ya ha sido asignado";
            return $fila;
        }

        $unid = $fila['id_unidad'];
        $sql = "select id, nombre, valor from usuario where idunidad = '". $unid."' or idSubUnidad =  '". $unid."'  order by valor asc LIMIT 1";
        $res = $this->EjecutarConsulta($sql);     
        $tecnico = @mysql_fetch_assoc($res);


        
        if($tecnico['nombre'] == null || $tecnico['nombre'] == ""){
            $tec    = "Ocampo Roman Cesar Augusto";
            $idtec  = 0;
            $valtec = 0;
        }else{
            $tec = $tecnico['nombre'];
            $idtec = $tecnico['id'];
            $valtec = $tecnico['valor']; 
        }

        $fila['tecnico']=$tec;
        $fila['idtec']=$idtec;
        $fila['valtec']=$valtec;

        if($fila) {
            $fila['status'] = "OK";
            $fila['message'] = "Exito";
            return $fila;
        }else{
            $fila['status'] = "ERROR";
            $fila['message'] = "El folio ingresado no es correcto";
            return $fila;
        }
        //return array();
        

    }


    //Obtner lista de reportes para la tabla
    public function getReportes() {

       $sql  = "select ";
        $sql .= "r.folio, ";
        $sql .= "r.fechaRecep, ";
        $sql .= "r.ipcaptura as ip, ";
        $sql .= "r.problema, ";
        $sql .= "r.personaquereporta, ";
        $sql .= "tp.descripcion, ";
        $sql .= "u.nombre as unidad, ";
        $sql .= "e.modelo ";
        $sql .="from reporte as r ";
        $sql .="JOIN atencionreportes as at  ON r.id = at.idreporte ";
        $sql .="JOIN equiposrecibidos as er ON r.id = er.idreporte ";
        $sql .="JOIN equipos as e ON er.idequipo = e.id ";
        $sql .="JOIN marca as m              ON e.idmarca = m.id ";
        $sql .="JOIN unidad as u              ON r.id_unidad = u.id ";
        $sql .="JOIN tipo as tp              ON e.idtipo = tp.id ";
        $sql .="WHERE at.idstatus = 6  ";      
            
            
        $res = $this->EjecutarConsulta($sql);
      
        $k = 0;
        while($fila = @mysql_fetch_assoc($res)){  
            $valores[$k++] = $fila;                       
         }
       
        if(isset($valores)) return $valores;

      

    }




    

}//Finaliza la clase Entrega

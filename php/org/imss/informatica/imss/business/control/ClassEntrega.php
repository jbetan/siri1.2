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
        $sql .="where at.idstatus != 6 ";
     
       
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
        if(strcmp($reporte["status"], "Entregado") == 0){
            return 3;
        }

        $time = time();
        $tim = date("H:i:s",$time);
        $this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("id", $reporte["id"]);
        $findR = $this->devuelve_fila_i("reporte");
        $this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("idreporte", $reporte["id"]);
        $findAR = $this->devuelve_fila_i("atencionreportes");
        if($findR && $findAR) {

            $this->IniciarTransaccion();
            $this->setKey("id", $reporte["id"]);
            $this->setValue("fechaEnt", $reporte["fecha"]);
            $this->setValue("recibido", $reporte["recibido"]);
            $this->setValue("horaEnt", $tim);
            $updateR = $this->actualizar("reporte");

            $this->setKey("idreporte", $reporte["id"]);
            $this->setValue("idstatus", 4);
            $updateAR = $this->actualizar("atencionreportes");

            if($updateAR and $updateR){
                $this->CometerTransaccion();
                return 1;
            }
        }
        $this->DeshacerTransaccion();
        return 2;


    }

    
       public function findReporteByFolio($id) {

        $sql = "select r.id, st.nombre as status, r.fechaRecep as finicio, at.fechaTerm as ftermino, u.nombre as unidad, a.nombre as area, e.modelo, e.numdeserie as serie, m.descripcion as marca, tp.descripcion, us.nombre as usuario ";
       // $sql = "select *";
        $sql .="from reporte as r ";
        $sql .="JOIN atencionreportes as at  ON r.id = at.idreporte ";
        $sql .="JOIN area as a    ON r.idarea = a.id ";
        $sql .="JOIN unidad as u  ON r.id_unidad = u.id ";
        $sql .="JOIN equiposrecibidos as er ON r.id = er.idreporte ";
        $sql .="JOIN equipos as e ON er.idequipo = e.id ";
        $sql .="JOIN status as st ON at.idstatus = st.id ";
        $sql .="JOIN marca as m   ON e.idmarca = m.id ";
        $sql .="JOIN tipo as tp   ON e.idtipo = tp.id ";
        $sql .="JOIN usuario as us  ON r.idusuario = us.id ";
        $sql .="WHERE r.folio = $id and at.idstatus = 3  LIMIT 1";

        try{
            $res = $this->EjecutarConsulta($sql);
        }catch (Exception $e){
            throw $e;
        }

        $fila = @mysql_fetch_assoc($res);

        if($fila) {
            return $fila;
        }
        return array();

    }



    public function findReporteById($id) {

        $sql = "select r.id, r.folio, st.nombre as status, r.fechaRecep as finicio, at.fechaTerm as ftermino, u.nombre as unidad, a.nombre as area, e.modelo, e.numdeserie as serie, m.descripcion as marca, tp.descripcion, us.nombre as usuario ";
       // $sql = "select *";
        $sql .="from reporte as r ";
        $sql .="JOIN atencionreportes as at  ON r.id = at.idreporte ";
        $sql .="JOIN area as a    ON r.idarea = a.id ";
        $sql .="JOIN unidad as u  ON r.id_unidad = u.id ";
        $sql .="JOIN equiposrecibidos as er ON r.id = er.idreporte ";
        $sql .="JOIN equipos as e ON er.idequipo = e.id ";
        $sql .="JOIN status as st ON at.idstatus = st.id ";
        $sql .="JOIN marca as m   ON e.idmarca = m.id ";
        $sql .="JOIN tipo as tp   ON e.idtipo = tp.id ";
        $sql .="JOIN usuario as us  ON r.idusuario = us.id ";
        $sql .="WHERE r.folio ='$id' and at.idstatus = 3  LIMIT 1";

        try{
            $res = $this->EjecutarConsulta($sql);
        }catch (Exception $e){
            throw $e;
        }

        $fila = @mysql_fetch_assoc($res);

        if($fila) {
            return $fila;
        }
        return array();

    }

}//Finaliza la clase Entrega


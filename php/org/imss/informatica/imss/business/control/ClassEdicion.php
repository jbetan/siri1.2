<?php
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector.php");
include_once(dirname(__FILE__)."/../../commons/class_utils.php");

class ClassEdicion extends  class_mysqlconnector
{


    public function autoNombre()
    {
        $this ->EjecutarConsulta("SET NAMES 'utf8';");
        $data = $this->devuelve_filas_indexlabel("usuario", "nombre");
        return $data;
    }

    public function auto()
    {
        $this ->EjecutarConsulta("SET NAMES 'utf8';");
        $data = $this->devuelve_filas_indexlabel("reporte", "id");
        return $data;
    }

    public function guardarReporte ($reporte)
    {
        print_r($reporte);
        $fecha = '';
        $hora = '';
        $this->IniciarTransaccion();
        $ban = false;
        //Comparamos si el equipo fue reparado si fue reaparado entra en el IF.
        if(strcmp($reporte["solucionado"], "SI") == 0){
            $time = time();
            $hora= date("H:i:s",$time);
            $fecha = date("j-m-y");
            $ban = true;
        }
        //Si el equipo no fue reparado entonces se escal y se crea in nuevo registro
        // en la tabla historialatecnion.
        if(strcmp($reporte["solucionado"], "SI") !== 0){
            $fecha = '';
            $hora = '';
            $this->setValue("idreporte", $reporte["idr"]);
            $this->setValue("idatencionreportes", $reporte["idat"]);
            $this->setValue("idactividades", 1);
            $this->setValue("comentario", $reporte["comentario"]);
             $this->insertar("historialatencion");
            $ban = true;
        }



        $this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("nombre", $reporte["usuarioD"]);
        $usuario_id = $this->devuelve_filas_indexlabel("usuario", "id");

        $this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("nombre", $reporte["status"]);
        $status= $this->devuelve_fila_i("status");

        //iniciamos a actualizar los datos d ela tabla atencion reportes
        $this->EjecutarConsulta("SET NAMES 'latin1'");
        $this->setKey("id", $reporte["idat"]);
        $this->setKey("idreporte", $reporte["idr"]);
        $find = $this->devuelve_fila_i("atencionreportes");
        if($find) {

           // $this->setKey("id", $reporte["idat"]);
            $this->setKey("idreporte", $reporte["idr"]);
            $this->setValue("idstatus", $status ['id']);
            $this->setValue("fechaTerm", $fecha);
            $this->setValue("horaTerm", $hora );
             $this->setValue("solucionado", $reporte["solucionado"]);
            if($usuario_id){
                print_r($usuario_id);
                $this->setValue("idusuarioDestino", $usuario_id);
            }
           
            $updateAT =$this->actualizar("atencionreportes");

            if($updateAT and $ban){
                $this->CometerTransaccion();
                return true;
            }
        }

        $this->DeshacerTransaccion();
        return false;
    }




    public function findUsuarioByTipo($nivel, $subnivel) {

         $fila = $this->devuelve_filas_indexlabel("usuario", "nombre,id");
        if($fila) {
            return $fila;
        }
        return array();

   }



    public function findActivities() {
        $fila = $this->devuelve_filas_indexlabel("actividades", "*");
        if($fila) {
            return $fila;
        }
        return array();
    }


     public function findReporteByFolio($id) {
      
        $sql = "select r.id as idr, r.personaquereporta,  at.id as idat, r.ipcaptura, tr.nombreTipo, cl.descripcion as claseTipo,  r.prioridad, r.problema, st.nombre as status, tr.nombretipo, r.folio, r.fechaRecep as finicio, at.fechaTerm as ftermino, u.nombre as unidad, a.nombre as area, e.modelo, e.numdeserie as serie, m.descripcion as marca, tp.descripcion ";
        $sql .="from reporte as r ";
        $sql .="JOIN atencionreportes as at  ON r.id = at.idreporte ";
        $sql .="JOIN area as a    ON r.idarea = a.id ";
        $sql .="JOIN unidad as u  ON r.id_unidad = u.id ";
        $sql .="JOIN equiposrecibidos as er ON r.id = er.idreporte ";
        $sql .="JOIN equipos as e ON er.idequipo = e.id ";
        $sql .="JOIN status as st ON at.idstatus = st.id ";
        $sql .="JOIN marca as m   ON e.idmarca = m.id ";
        $sql .="JOIN tipo as tp   ON e.idtipo = tp.id ";
        //$sql .="JOIN usuario as us  ON r.idusuario = us.id "; //No ce porque va
        //$sql .="JOIN categoriau as catus ON  us.idcategoria = catus.id  ";
        // $sql .="JOIN categoriau as subcatus ON  us.subcategoria = subcatus.id  ";
        $sql .="JOIN tiporeporte as tr  ON r.idtiporeporte = tr.id ";
        $sql .="JOIN clase as cl  ON r.idClase = cl.id ";
        $sql .="WHERE r.folio = $id LIMIT 1";

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

        $sql = "select r.id as idr, r.personaquereporta,  at.id as idat, r.ipcaptura, tr.nombreTipo, cl.descripcion as claseTipo,  r.prioridad, r.problema, st.nombre as status, tr.nombretipo, r.folio, r.fechaRecep as finicio, at.fechaTerm as ftermino, u.nombre as unidad, a.nombre as area, e.modelo, e.numdeserie as serie, m.descripcion as marca, tp.descripcion ";
        $sql .="from reporte as r ";
        $sql .="JOIN atencionreportes as at  ON r.id = at.idreporte ";
        $sql .="JOIN area as a    ON r.idarea = a.id ";
        $sql .="JOIN unidad as u  ON r.id_unidad = u.id ";
        $sql .="JOIN equiposrecibidos as er ON r.id = er.idreporte ";
        $sql .="JOIN equipos as e ON er.idequipo = e.id ";
        $sql .="JOIN status as st ON at.idstatus = st.id ";
        $sql .="JOIN marca as m   ON e.idmarca = m.id ";
        $sql .="JOIN tipo as tp   ON e.idtipo = tp.id ";
        //$sql .="JOIN usuario as us  ON r.idusuario = us.id "; //No ce porque va
        //$sql .="JOIN categoriau as catus ON  us.idcategoria = catus.id  ";
        // $sql .="JOIN categoriau as subcatus ON  us.subcategoria = subcatus.id  ";
        $sql .="JOIN tiporeporte as tr  ON r.idtiporeporte = tr.id ";
        $sql .="JOIN clase as cl  ON r.idClase = cl.id ";
        $sql .="WHERE r.folio = '$id' LIMIT 1";

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

    // empieza activos 1:02 am
    public function getReportes() {

        $sql = "select r.id as idr, r.folio, r.personaquereporta,  r.prioridad,  r.problema, ";
        $sql .="st.nombre as status,  r.fechaRecep as finicio,  at.fechaTerm as ftermino, ";
        $sql .="u.nombre as unidad,  a.nombre as area,  e.modelo,  e.numdeserie as serie, ";
        $sql .="m.descripcion as marca,  tp.descripcion ";
        $sql .="from reporte as r ";
        $sql .="JOIN atencionreportes as at  ON r.id = at.idreporte ";
        $sql .="JOIN area as a    ON r.idarea = a.id ";
        $sql .="JOIN unidad as u  ON r.id_unidad = u.id ";
        $sql .="JOIN equiposrecibidos as er ON r.id = er.idreporte ";
        $sql .="JOIN equipos as e ON er.idequipo = e.id ";
        $sql .="JOIN marca as m   ON e.idmarca = m.id ";
        $sql .="JOIN tipo as tp   ON e.idtipo = tp.id ";
        $sql .="JOIN status as st ON at.idstatus = st.id ";
        //$sql .="JOIN usuario as us  ON r.idusuario = us.id ";
        // $sql .="where at.idstatus != 6 ";
       
     
       
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


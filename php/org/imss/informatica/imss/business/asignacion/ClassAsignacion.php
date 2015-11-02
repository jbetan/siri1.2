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

    public function auto()
    {
        $this ->EjecutarConsulta("SET NAMES 'utf8';");
        $data = $this->devuelve_filas_indexlabel("reporte", "id");
        return $data;
    }

    public function guardarReporte ($reporte)
    {
        print_r($reporte);
        $this->IniciarTransaccion();

        $this->setKey("nombre", $reporte["status"]);
        $status= $this->devuelve_fila_i("status");

        $this->setKey("descripcion", $reporte["clase"]);
        $clase= $this->devuelve_fila_i("clase");


        //------Sumamos contador a los usuarios
        $suma = $reporte["valtec"] +1;
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


    public function findClase()
    {

        $fila = $this->devuelve_filas_indexlabel("clase", "idTipoReporte, descripcion");
        if($fila) {
            return $fila;
        }
        return array();

    }



    public function findUsuarioByOtro() {
        $this->setKey(tipo,'OTRO');
        $fila = $this->devuelve_filas_indexlabel("usuario", " nombre");
        if($fila) {
            return $fila;
        }
        return array();
    }

    public function findUsuarioByTipo($tipo) {
        $this->setKey('tipo', $tipo);
        $fila = $this->devuelve_filas_indexlabel("usuario", "nombre", "order by peso asc LIMIT 1");
        if($fila) {
            return $fila;
        }
        return array();
    }


    public function findReporteById($id) {

        $sql = "select r.id as idr, r.personaquereporta, r.id_unidad, at.id as idat, r.ipcaptura, r.problema, r.folio, r.fechaRecep as finicio, u.nombre as unidad, a.nombre as area, e.modelo, e.numdeserie as serie, m.descripcion as marca, tp.descripcion ";
        $sql .="from reporte as r ";
        $sql .="JOIN atencionreportes as at  ON r.id = at.idreporte ";
        $sql .="JOIN area as a               ON r.idarea = a.id ";
        $sql .="JOIN unidad as u             ON r.id_unidad = u.id ";
        $sql .="JOIN equiposrecibidos as er  ON r.id = er.idreporte ";
        $sql .="JOIN equipos as e            ON er.idequipo = e.id ";
/*ped*/ $sql .="JOIN status as st            ON at.idstatus = st.id ";
        $sql .="JOIN marca as m              ON e.idmarca = m.id ";
        $sql .="JOIN tipo as tp              ON e.idtipo = tp.id ";
        //$sql .="JOIN tiporeporte as tr       ON r.idtiporeporte = tr.id ";
        $sql .="WHERE r.id = $id LIMIT 1";
        try{
            $res = $this->EjecutarConsulta($sql);
        }catch (Exception $e){
            throw $e;
        }

        $fila = @mysql_fetch_assoc($res);

        $unid = $fila['id_unidad'];
        $sql = "select id, nombre, valor from usuario where idunidad = '". $unid."' or idSubUnidad =  '". $unid."'  order by valor asc LIMIT 1";
        try{
            $res = $this->EjecutarConsulta($sql);
        }catch (Exception $e){
            throw $e;
        }
        $tecnico = @mysql_fetch_assoc($res);

        $tec = $tecnico['nombre'];
        $idtec = $tecnico['id'];
        $valtec = $tecnico['valor'];

        if($tec == null || $tec == ""){
            $tec ="Ocampo Roman Cesar Augusto";
            $idtec =0;
            $valtec = -1;
        }
        $fila['tecnico']=$tec;
        $fila['idtec']=$idtec;
        $fila['valtec']=$valtec;

      //  print_r($fila);
        if($fila) {
            return $fila;
        }
        return array();

    }




    public function getDtcReportes()
    {
        return $this->dtcReportes;
    }

    public function  setDtcReportes()
    {
        $this -> dtcReportes = array(
            array("nombre"=>"idr", "tipo"   => Utils::$TIPO_NUMERO),
            array("nombre"=>"idat", "tipo"   => Utils::$TIPO_NUMERO),

            array("nombre"=>"folio", "tipo" => Utils::$TIPO_TEXTO),
            array("nombre"=>"finico", "tipo"=> Utils::$TIPO_FECHA),
            array("nombre"=>"tipoC", "tipo" => Utils::$TIPO_TEXTO),
            array("nombre"=>"marca", "tipo" => Utils::$TIPO_TEXTO),
            array("nombre"=>"modelo", "tipo" => Utils::$TIPO_TEXTO),
            array("nombre"=>"unidad", "tipo" => Utils::$TIPO_TEXTO),
            array("nombre"=>"area", "tipo" => Utils::$TIPO_TEXTO),
            array("nombre"=>"serie", "tipo" => Utils::$TIPO_TEXTO),
            array("nombre"=>"ipcaptura", "tipo"=> Utils::$TIPO_TEXTO)


        );
    }

    public function getReportesByDataTable($draw, $columns, $order, $start, $length, $search) {

        $cols = "";
        foreach($this->dtcReportes as $col) {
            $cols.= ( $cols ? "," : "" ).$col["nombre"];
        }
        //$this->EjecutarConsulta("SET NAMES 'latin1'");
        $where = Utils::getComplementDataTableQuery($this->dtcReportes, $columns, $order, 0, -1, $search);
        $sql = "SELECT count(*) FROM vistaasignacion WHERE 1 ".$where;
        $res = $this->EjecutarConsulta($sql);
        $total = mysql_result($res, 0,0);

        $where = Utils::getComplementDataTableQuery($this->dtcReportes, $columns, $order, $start, $length, $search);

        $sql = "SELECT $cols FROM vistaasignacion WHERE 1 ".$where;
        $res = $this->EjecutarConsulta($sql);
        $rows = array();
        while($row = mysql_fetch_assoc($res)){
            $rows[] = $row;
        }
        print_r($row);
        return array(
            "draw"=> $_REQUEST["draw"],
            "recordsTotal"=> $total,
            "recordsFiltered"=> $total,
            "data"=>$rows
        );
    }

    public function vista()
    {
        $res = $this -> devuelve_filas(vistaasignacion);
        print_r($res);
        //var_dump($res);
    }

}//Finaliza la clase Entrega

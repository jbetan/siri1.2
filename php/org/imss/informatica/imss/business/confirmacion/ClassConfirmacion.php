<?php
/**
 * Created by PhpStorm.
 * User: Brayan
 * Date: 10/11/2015
 * Time: 10:28 AM
 */
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector.php");

class ClassConfirmacion extends  class_mysqlconnector
{
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
        $arreglo2 = @mysql_fetch_row($res);
        if(is_array($arreglo2))
        {
            //print_r($arreglo2);
            return $arreglo2;
        }else{
            return array();
        }
    }
}
$reporte= new ClassConfirmacion();
$id= $_GET['id'];
//print_r($id);
exit (json_encode($reporte->TraeReporteGuardado($id)));
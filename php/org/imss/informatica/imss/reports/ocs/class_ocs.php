<?php
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector_ocs.php");

class class_ocs extends class_mysqlconnector
{
    public function consulta_ip()
    {
        //gethostbyname(gethostbyaddr($_SERVER['REMOTE_ADDR']) )
        $ip="11.105.33.32";
        $this->setKey("IPADDR", $ip);
        $arreglo = $this->devuelve_filas_indexlabel("hardware");
        $id= $arreglo[0]['ID'];
        $sql="SELECT bios.SMANUFACTURER, bios.SMODEL, bios.ASSETTAG, subnet.NAME, networks.IPADDRESS, networks.MACADDR ";
        $sql .="from bios  ";
        $sql .="JOIN networks ON bios.HARDWARE_ID = networks.HARDWARE_ID ";
        $sql .="JOIN subnet ON networks.IPSUBNET = subnet.NETID ";
        $sql .="where bios.HARDWARE_ID = $id AND (networks.IPSUBNET = subnet.NETID)";
        try
        {
            $res= $this->EjecutarConsulta($sql);
        }catch (Exception $e){
            throw $e;
        }
        $arreglo2 = @mysql_fetch_assoc($res);
        if(is_array($arreglo2))
        {
            return $arreglo2;
        }else{
            return array();
        }
    }
    public function  buscar_ip($ip){

        $this->setKey("IPADDR", $ip);
        $arreglo = $this->devuelve_filas_indexlabel("hardware");
        $id= $arreglo[0]['ID'];
        $sql="SELECT bios.SMANUFACTURER, bios.SMODEL, bios.ASSETTAG, subnet.NAME ";
        $sql .="from bios  ";
        $sql .="JOIN networks ON bios.HARDWARE_ID = networks.HARDWARE_ID ";
        $sql .="JOIN subnet ON networks.IPSUBNET = subnet.NETID ";
        $sql .="where bios.HARDWARE_ID = '$id' AND (networks.IPSUBNET = subnet.NETID)";

        try
        {
            $res= $this->EjecutarConsulta($sql);
        }catch (Exception $e){
            throw $e;
        }

        $arreglo2 = @mysql_fetch_assoc($res);
        if(is_array($arreglo2))
        {
            return $arreglo2;
        }else{
            return array();
        }
    }

}

$ip_get = $_GET['buscar'];
$report = new class_ocs();
if($ip_get !=""){
    echo json_encode($report->buscar_ip($ip_get));
} else{
    $ocs = $report->consulta_ip();
    exit(json_encode($ocs));
}
$report->Desconectar();


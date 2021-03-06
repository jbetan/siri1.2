<?php
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector_ocs.php");

class class_ocs extends class_mysqlconnector_ocs
{
    public function consulta_ip()
    {
        $ip = gethostbyname(gethostbyaddr($_SERVER['REMOTE_ADDR']) );
       // $ip="172.23.137.210";
        $this->setKey("IPADDR", $ip);
        $arreglo = $this->devuelve_filas_indexlabel("hardware");
        $id= $arreglo[0]['ID'];
        $sql="SELECT bios.SMANUFACTURER, bios.SMODEL, bios.TYPE, bios.SSN, subnet.NAME, networks.IPADDRESS, networks.MACADDR, hardware.USERID ";
        $sql .="from bios  ";

        $sql .="JOIN hardware ON bios.HARDWARE_ID = hardware.ID ";
        $sql .="JOIN networks ON hardware.IPADDR = networks.IPADDRESS ";
        $sql .="JOIN subnet ON networks.IPSUBNET = subnet.NETID ";

//        $sql .="JOIN networks ON bios.HARDWARE_ID = networks.HARDWARE_ID ";
//        $sql .="JOIN subnet ON networks.IPSUBNET = subnet.NETID ";
        $sql .="where bios.HARDWARE_ID = $id AND (hardware.IPADDR = networks.IPADDRESS) AND (networks.IPSUBNET = subnet.NETID)";
        try
        {
            $res= $this->EjecutarConsulta($sql);
        }catch (Exception $e){
            throw $e;
        }
        $arreglo2 = @mysql_fetch_assoc($res);
        if(is_array($arreglo2))
        {
            //print_r($arreglo2);
            return $arreglo2;
        }else{
            return array();
        }
    }
    public function consulta_solo_ip(){

        $ip = gethostbyname(gethostbyaddr($_SERVER['REMOTE_ADDR']));
        //$ip="11.1.33.58";
			//print_r ($ip);
			
		   // $ip="11.105.33.32";
            $this->setKey("IPADDRESS", $ip);
            $arreglo = $this->devuelve_filas_indexlabel("networks","IPADDRESS");
            if(is_array($arreglo))
            {
                return $arreglo[0];
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
if($_POST['send'] == "datos"){
    $array_ocs = $report->consulta_ip();
    exit(json_encode($array_ocs));
}


if($ip_get !=""){
    echo json_encode($report->buscar_ip($ip_get));
} else if($_GET["ver_ip"]){
    $ocs = $report->consulta_solo_ip();
    exit(json_encode($ocs));
}else{
    $ocs = $report->consulta_ip();
    exit(json_encode($ocs));
}
$report->Desconectar();


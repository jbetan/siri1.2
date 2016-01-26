<?php
/**
 * Created by PhpStorm.
 * User: Brayan
 * Date: 08/11/2015
 * Time: 12:05 AM
 */
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector_ocs.php");

class class_ip_ocs extends class_mysqlconnector_ocs
{
    public function comparar_ip()
    {
        $ip="11.105.33.32";
        //$ip=gethostbyname(gethostbyaddr($_SERVER['REMOTE_ADDR']) );
        $this->setKey("IPADDRESS", $ip);
        $is_ip = $this->devuelve_filas_indexlabel("networks");
        if($is_ip == null){
            return false;
        }else{
            return true;
        }
<<<<<<< HEAD
        print_r($is_ip);
=======
        //print_r($is_ip);
>>>>>>> 6166e9b1de1602d888d04aef812ecf96c1ae1790

    }

}
$report = new class_ip_ocs();
if(isset($_POST['send'])){
    $dato = $report->comparar_ip();
    exit(json_encode($dato));
}

$report->Desconectar();



<?php
include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector.php");
include_once(dirname(__FILE__)."/../../commons/class_utils.php");

class ClassConfig extends  class_mysqlconnector
{
    
    public function get_data_user(){     
	    $data = array();
	    $data['acceso'] = $_SESSION["imss"];
	    return $data;
    }
}
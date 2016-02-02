<?php
session_name("EnterAccessCFERecibos");
session_start();
include_once("../business/Config/ClassConfig.php");
$config = new ClassConfig();

//---------

if($_GET["get_data_user"]){
	
    exit(json_encode($config->get_data_user()));
}
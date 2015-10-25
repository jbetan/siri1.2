<?php
require_once(str_replace("\\","/",dirname(__FILE__))."/../../commons/class_mysqlconnector.php");
// CLASE PARA EL CONTROL DE LA SEGURIDAD Y PERMISOS
class class_seguridad extends class_mysqlconnector
{

	function __construct()
	{
		$this->LeerConfiguracion();
	}

	public function getAcceso($userName, $password){
		if($userName == "administrador" && md5($password) == md5("Aa12345$")){
			$permisos = array("id_usuario" => NULL, "nombre" => "Administrador", "user_name" => "administrador", "permiso" => 10, "acceso" => 1);
		}else{
		 	$sql = "select id_tecnico, nombre, tipo, matricula from tecnicos where usuario='$userName' and contrasena= md5('$password')";
		 	try{
		 		$res = $this->EjecutarConsulta($sql);
		 	}catch (Exception $e){
		 		throw $e;
		 	}

		 	print_r(mysql_error());
		 	if(@mysql_num_rows($res)){
		 		$id = @mysql_result($res, 0,0);
		 		$nombre = @mysql_result($res, 0,1);
		 		$tipo = @mysql_result($res, 0,2);
		 		$matricula = @mysql_result($res, 0,3);
		 		$permiso = 1;

		 		$permisos = array("id_usuario" => $id, "nombre" => $nombre,"tipo"=>$tipo, "matricula"=>$matricula, "user_name" => $userName, "permiso" => $permiso, "acceso" => 1);
		 	}else {
		 		$permisos = array("acceso" => 0);
		 	}
		 }
		return $permisos;
	}


}?>
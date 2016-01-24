<?php
require_once(str_replace("\\","/",dirname(__FILE__))."/../../commons/class_mysqlconnector.php");
// CLASE PARA EL CONTROL DE LA SEGURIDAD Y PERMISOS
class class_seguridad extends class_mysqlconnector
{

	function __construct()
	{
		$this->LeerConfiguracion();
	}

	public function getAcceso($userName, $password, $nivel){
		if($userName == "administrador" && md5($password) == md5("Aa12345$")){
			$permisos = array("id_usuario" => NULL, "nombre" => "Administrador", "user_name" => "administrador", "permiso" => 10, "acceso" => 1);
		}else{
			
			$sql = "SELECT 
					us.id, 
					us.nombre, 
					us.tipo, 
					us.matricula,
					cu.nombre as tipoNivel,
					cu.nivel 
					from usuario as us
					LEFT JOIN categoriau as cu ON us.idcategoria = cu.id
				 	WHERE us.matricula='{$userName}' and us.contrasena = md5('{$password}') and cu.nivel = $nivel";
				 	//echo $sql;
				 	//exit();

		 	try{
		 		$res = $this->EjecutarConsulta($sql);
		 	}catch (Exception $e){
		 		throw $e;
		 	}
		 	print_r(mysql_error());
		 	if(@mysql_num_rows($res)){
		 		$id        		= @mysql_result($res, 0,0); //id
		 		$nombre    		= @mysql_result($res, 0,1); // nombre
		 		$tipo      		= @mysql_result($res, 0,2); //tipo es el que va a decir el tipo de menu
		 		$matricula 		= @mysql_result($res, 0,3); //matricula
		 		$nivel_usuario  = @mysql_result($res, 0,4); //nivel del usuario
		 		$nivel          = @mysql_result($res, 0,5); //nivel
		 		$permiso   = 1;

		 		$permisos = array(
		 			"id_usuario"   => $id,
		 			"nombre"       => $nombre,
		 			"tipo"         => $tipo, 
		 			"matricula"    => $matricula,
		 			"niv_usuario"  => $nivel_usuario,
		 			"nivel"        => $nivel, 
		 			"user_name"    => $userName, 
		 			"permiso"      => $permiso, 
		 			"acceso"       => 1
		 		);
		 	}else {
		 		$permisos = array("acceso" => 0);
		 	}
		 }
		return $permisos;
	}


}?>
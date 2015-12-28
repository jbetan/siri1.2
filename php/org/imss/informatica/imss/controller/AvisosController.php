<?php
	session_name("EnterAccessCFERecibos");
	session_start();
	$r = "../../../../../../";
	include_once("../business/administrador/ClassAvisos.php");
	$aviso = new ClassAviso();

	

	if($_GET["save"]) {	

		$file = $_FILES["file"]["name"];
		if(!is_dir($r."web/files/"))			
			mkdir($r."web/files/", 0777);

		if($file && move_uploaded_file($_FILES["file"]["tmp_name"], $r."web/files/".$file))
		{	
			 // echo '<pre>';
    //             var_dump($_POST["aviso"]);
    //          echo '</pre>';
			 try {
		        if ($aviso -> save_aviso($_POST, $file)) {
		         exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));
		        }
		        else {
		            
		        }
		    } catch (Exception $e){
		        exit(json_encode(array("error" => true,"otro"=>"catch", "message" => $e->getMessage())));
		    }
			
		}else{
			exit(json_encode(array("error" => true, "message" => "Error inesperado, La imgen no se pudo subir")));
		}
	}

	if ($_GET["delete"]) {
		echo "otro".$_GET["id"];
		 try {
	        if ($aviso -> delete_aviso($_GET["id"])) {
	            exit(json_encode(array("error" => false, "message" => "Se ha realizado correctamente")));
	        } else {
	            exit(json_encode(array("error" => true, "message" => "Error inesperado al eliminar aviso, verifique los datos")));
	        }
	    }catch(Exception $e) {
	        exit(json_encode(array("error" => true, "message" =>$e->getMessage())));
	    }
		
	}

	if ($_GET["get_aviso_id"]) {
		exit(json_encode($aviso->get_aviso_id($_REQUEST["id"])));
	}

	if ($_GET["get_avisos"]) {
		exit(json_encode($aviso->get_avisos()));
	}
?>


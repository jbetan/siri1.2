<?php
error_reporting(0);
include_once(dirname(__FILE__)."/../src/config.inc.php");
include_once(dirname(__FILE__)."/class_exception.php");
// CLASE PARA EL MANEJO DE MySQL
class class_mysqlconnector
{
	// VARIABLES
	private $servidor;
	private $usuario;
	private $contrasena;
	private $basededatos;
	private $anio;
	private $oConexion;
	private $keys;
	private $values;
	private $root = "";
	private $forzar_utf8 = 0;
	private $hacer_throw=1;
	public $sql = "";
	
	// FUNCIONES Y PROCEDIMIENTOS
	function __construct(){
		$this->LeerConfiguracion();
	}
	
	function getKeys(){
		return $this->keys;
	}
	
	public function Conectar(){
		try
		 {
		 	if (!isset($this->oConexion))
			 {
				$this->LeerConfiguracion();
				$this->oConexion = @mysql_connect($this->servidor, $this->usuario, $this->contrasena);
				//echo "S:".$this->servidor."U:".$this->usuario."C:".$this->contrasena."BD:".$this->basededatos;
				if (!$this->oConexion) 
					throw new class_exception("No se puede establecer la conexi&oacute;n: ".mysql_error(), 8001, "Conectar");
				$result = @mysql_select_db($this->basededatos.$this->anio, $this->oConexion);
				
				@mysql_query("SET NAMES 'utf8'");
				@mysql_query("SET AUTOCOMMIT=0");			
				if (!$result) 
					throw new class_exception("No se puede seleccionar la base de datos: ".mysql_error(), 8002, "Conectar");			
			 }
				
			return true;
		 }
		catch (Exception $e)
		 {
			 //echo $e;
		 }
	}

    //**************************************Las Funciones Mas  Utilizadas****************************************;

    /*
        Estas sirven para reiniciar le autoicremeto de una tablas

    ALTER TABLE nombre_tabla AUTO_INCREMENT = 1
    TRUNCATE nombre_tabla; Con este se boora todosmlos datos de la tabla

        mysql_fetch_row() - Obtiene una fila de resultados como un array numérico
        mysql_fetch_array() - Recupera una fila de resultados como un array asociativo, un array numérico o como ambos
        mysql_fetch_assoc() - Recupera una fila de resultados como un array asociativo
        mysql_fetch_object() - Recupera una fila de resultados como un objeto
    */
    public function EjecutarConsulta($sSQL)
    {
        $this->sql = $sSQL;
        try
        {
            $this->Conectar();
            $result = @mysql_query($sSQL, $this->oConexion);
            if (!$result)
                throw new class_exception("No se puede ejecutar la consulta: ".mysql_error(), 8006, "EjecutarConsulta");
            return $result;
        }
        catch (Exception $e){
            //echo $sSQL;
            if($this->hacer_throw)
                throw $e;
            else{
                //echo $e;
            }
        }
    }

    public function setKey($key, $value)
    {
        $this->keys[$key] = new collection($key, $value);
    }

    public function setValue($key, $value)
    {
        $this->values[$key] = new collection($key, $value);
    }

    public function eliminar($tabla)
    {
        try
        {
            $sSQL = "DELETE FROM ".$tabla." WHERE ";
            $sSQL .= $this->devuelve_values($this->keys, " AND ", 0, 0);
            $this->Conectar();
            $this->EjecutarConsulta($sSQL);
            unset($this->keys);
            return true;
        }
        catch (Exception $e)
        {
            //echo $e;
            return NULL;
        }

    }

    public function actualizar($tabla)
    {
        try
        {
            $sSQL = "UPDATE ".$tabla." SET ";
            $sSQL .= $this->devuelve_values($this->values, ", ", 0, 1);
            $sSQL .= " WHERE ".$this->devuelve_values($this->keys, " AND ", 0, $this->forzar_utf8);

            $this->Conectar();
            $result = $this->EjecutarConsulta($sSQL);
            unset($this->values);
            unset($this->keys);
            return true;
        }
        catch (Exception $e)
        {
            if($this->hacer_throw)
                throw $e;
            else{
                return NULL;
            }
        }
    }

    public function insertar($tabla)
    {
        try
        {
            $sSQL = "INSERT INTO ".$tabla." (";
            $sSQL .= $this->devuelve_values($this->values, ", ", 1, 0).")";
            $sSQL .= " VALUES (".$this->devuelve_values($this->values, ", ", 2, 0).")";
            $this->Conectar();
            $result = $this->EjecutarConsulta($sSQL);
            //echo mysql_insert_id($this->oConexion);
            unset($this->values);
            unset($this->keys);
            return $this->ultimoid();
        }
        catch (Exception $e)
        {
            if($this->hacer_throw)
                throw $e;
            else{
                //echo $e;
                return NULL;
            }
        }
    }

    //Esta es la funcion mas recomendada para consultar
    public function devuelve_filas($tabla, $campos="*", $limit="", $callback_row = NULL){
        try
        {
            $sSQL = "SELECT ".$campos." FROM ".$tabla." WHERE ";
            $sSQL .= (count($this->keys) ? $this->devuelve_values($this->keys, " AND ", 0, 1) : "1");
            $sSQL .= " ".$limit;
            $this->Conectar();
            $result = $this->EjecutarConsulta($sSQL);

            // Col�mnas

            $k = 0;
            while($fila = @mysql_fetch_array($result))
            {
                $valores[$k++] = $fila;
                if($callback_row != NULL){
                    //$callback_row(&$valores[$k-1]);
                }
            }

            if (!$result)
                throw new class_exception("No se puede ejecutar la consulta: ".mysql_error(), 8006, "devuelve_fila_i");

            unset($this->values);
            unset($this->keys);
            if(isset($valores)) return $valores;
        }
        catch (Exception $e)
        {
            if($this->hacer_throw)
                throw $e;
            else{
                //echo $e;
            }
        }
        return NULL;
    }

    //**************************************Termina Las Funciones mas  Utilizadas****************************************;



    //**************************************Transacciones********************************************************;

/* ******************Ejemplo de hacer transacciones *****************************

    1 <?php
    2 mysql_query("BEGIN");
    3 $balance = ..... mysql_query("SELECT balance FROM cuentas WHERE cuenta=X");
    4 $resultado = mysql_query("UPDATE cuentas SET balance=$balance+10 WHERE cuenta=X");
    5
    6 if ($resultado !== false)
    7     // la consulta fue exitosa
    8     mysql_query("COMMIT");
    9 else
    10     mysql_query("ROLLBACK");

*************************Otro Ejemplo*********************************************
     mysql_query("SET AUTOCOMMIT=0");
    mysql_query("START TRANSACTION");

    $a1 = mysql_query("INSERT INTO rarara (l_id) VALUES('1')");
    $a2 = mysql_query("INSERT INTO rarara (l_id) VALUES('2')");

    if ($a1 and $a2) {
        mysql_query("COMMIT");
    } else {
        mysql_query("ROLLBACK");
}

**********************************************************************************/
    public function IniciarTransaccion()
    {
        try
        {
            $result = @mysql_query("BEGIN", $this->oConexion);
            if (!$result)
                throw new class_exception("No se puede iniciar la transacci&oacute;: ".mysql_error(), 8008, "IniciarTransaccion");
        }
        catch (Exception $e)
        {
            //echo $e;
        }
    }

    public function CometerTransaccion()
	{
		try
		 {
		 	$result = @mysql_query("COMMIT", $this->oConexion);
			if (!$result) 
				throw new class_exception("No se puede confirmar la transacci&oacute;: ".mysql_error(), 8003, "CometerTransaccion");
		 }
		catch (Exception $e)
		 {
			 //echo $e;
		 }
	}

    public function DeshacerTransaccion()
    {
        try
        {
            $result = @mysql_query("ROLLBACK", $this->oConexion);
            if (!$result)
                throw new class_exception("No se puede deshacer la transacci&oacute;: ".mysql_error(), 8005, "DeshacerTransaccion");
        }
        catch (Exception $e)
        {
            //echo $e;
        }
    }

    //**************************************Termina Transacciones********************************************************;
	public function Desconectar()
	{
		try
		 {
			$result = @mysql_close($this->oConexion);
			unset($this->oConexion);
			if (!$result) 
				throw new class_exception("No se puede desconectar: ".mysql_error(), 8004, "Desconectar");
		 }
		catch (Exception $e)
		 {
			 //echo $e;
		 }
	}
	

	

//no lo usen
	public function devuelve_fila($tabla)
	{
		try
		 {
		 	$sSQL = "SELECT * FROM ".$tabla." WHERE ";
			$sSQL .= $this->devuelve_values($this->keys, " AND ", 0, 1);
			$this->Conectar();
		 	$result = $this->EjecutarConsulta($sSQL);
			$result = @mysql_fetch_object($result);

			
			foreach($result as $v)
			{
				$v = ($v);				
			}			
			
			if (!$result) 
				throw new class_exception("No se puede ejecutar la consulta: ".mysql_error(), 8006, "devuelve_fila");
			return $result;
		 }
		catch (Exception $e)
		 {
			 //echo $e;
		 }
	}
//Devuelve la primer registro encontrado
	public function devuelve_fila_i($tabla)
	{
		try
		 {
		 	$sSQL = "SELECT * FROM ".$tabla." WHERE ";
			$sSQL .= $this->devuelve_values($this->keys, " AND ", 0, 1);
			
			$this->Conectar();
		 	$result = $this->EjecutarConsulta($sSQL);
			$valores = mysql_fetch_array($result);

			if (!$result)
				throw new class_exception("No se puede ejecutar la consulta: ".mysql_error(), 8006, "devuelve_fila_i");

			unset($this->values);
			unset($this->keys);
			if(isset($valores)) return $valores;
		 }
		catch (Exception $e)
		 {
			 //echo $e;
		 }
		 return NULL;
	}	


    //La  diferecnia entre devuelve_filas y devuelve_filas_noindex es la forma en que lee los datos en la base de datos
    //uno lo lle con "@mysql_fetch_row" y el otro de la forma  "@mysql_fetch_array"
	
	public function devuelve_filas_noindex($tabla, $campos="*", $limit="", $callback_row = NULL){
		try
		 {
		 	$sSQL = "SELECT ".$campos." FROM ".$tabla." WHERE ";
			$sSQL .= (count($this->keys) ? $this->devuelve_values($this->keys, " AND ", 0, 1) : "1");
			$sSQL .= " ".$limit;
			$this->sql = $sSQL;
			$this->Conectar();
		 	$result = $this->EjecutarConsulta($sSQL);

			// Col�mnas
			
			$k = 0;
			while($fila = @mysql_fetch_row($result))
			 {	
			 	$valores[$k++] = $fila;
				if($callback_row != NULL){
					//$callback_row(&$valores[$k-1]);
				}
				
			 	
			 }

			if (!$result) 
				throw new class_exception("No se puede ejecutar la consulta: ".mysql_error(), 8006, "devuelve_fila_i");

			unset($this->values);
			unset($this->keys);
			if(isset($valores)) return $valores;
		 }
		catch (Exception $e)
		 {
			 if($this->hacer_throw) 
				throw $e;
			else{
				//echo $e;
			}
		 }
		 return NULL;
	}
	
	public function devuelve_filas_indexlabel($tabla, $campos="*", $limit="", $callback_row = NULL){
		try
		 {
		 	$sSQL = "SELECT ".$campos." FROM ".$tabla." WHERE ";
			$sSQL .= (count($this->keys) ? $this->devuelve_values($this->keys, " AND ", 0, 1) : "1");
			$sSQL .= " ".$limit;
			$this->Conectar();
		 	$result = $this->EjecutarConsulta($sSQL);

			// Col�mnas
			
			$k = 0;
			while($fila = @mysql_fetch_assoc($result))
			 {	
			 	$valores[$k++] = $fila;

				if($callback_row != NULL){
					//$callback_row(&$valores[$k-1]);
				}
				
			 	
			 }

			if (!$result) 
				throw new class_exception("No se puede ejecutar la consulta: ".mysql_error(), 8006, "devuelve_fila_i");

			unset($this->values);
			unset($this->keys);
			if(isset($valores)) return $valores;
		 }
		catch (Exception $e)
		 {
			 if($this->hacer_throw) 
				throw $e;
			else{
				//echo $e;
			}
		 }
		 return NULL;
	}
	//devule todas las filas
	public function devuelve_all_fila_i($tabla)
	{
		try
		 {
		 	$sSQL = "SELECT * FROM ".$tabla." WHERE ";
			$sSQL .= $this->devuelve_values($this->keys, " AND ", 0, 1);
			
			$this->Conectar();
		 	$result = $this->EjecutarConsulta($sSQL);

			// Col�mnas
			
			$k = 0;
			while($fila = @mysql_fetch_array($result))
			 {
				 $valores[$k++] = $fila;
			 	
			 }

			if (!$result) 
				throw new class_exception("No se puede ejecutar la consulta: ".mysql_error(), 8006, "devuelve_fila_i");

			unset($this->values);
			unset($this->keys);
			if(isset($valores)) return $valores;
		 }
		catch (Exception $e)
		 {
			 //echo $e;
		 }
		 return NULL;
	}	
	
	public function devuelve_values($obj, $separador, $opcion, $usa_utf8)
	{
		$sSQL = "";
		// mysql_real_escape_string requiere una conexi�n establecida.
		$this->Conectar();
		foreach($obj as $collection)
		{
			if ($opcion == 0)
			 {
			 	if (trim($separador)=="AND")
				 {
				 	if ($usa_utf8==1)
					 {
						$sSQL .= 	$collection->key."=".
								 $this->devuelve_apostrofe($collection->value).( $collection->value == null ? 'NULL' :
								mysql_real_escape_string((trim($collection->value)),$this->oConexion)).
								 $this->devuelve_apostrofe($collection->value).
										$separador;					 
					 }
					else
					 {
						$sSQL .= 	$collection->key."=".
								 $this->devuelve_apostrofe($collection->value).( $collection->value == null ? 'NULL' :
									mysql_real_escape_string((trim($collection->value)),$this->oConexion)).
								 $this->devuelve_apostrofe($collection->value).
										$separador;
					 }
				 }
				else
				 {
					$sSQL .= 	$collection->key."=".
							 $this->devuelve_apostrofe($collection->value).( $collection->value == null ? 'NULL' :
							mysql_real_escape_string((trim($collection->value)),$this->oConexion)).
							 $this->devuelve_apostrofe($collection->value).
									$separador;
				 }
			 }
			elseif($opcion == 1)
			 {
			 	$sSQL .= $collection->key.$separador;
			 }
			elseif($opcion == 2)
			 {
				$sSQL .= $this->devuelve_apostrofe($collection->value).( $collection->value == null ? 'NULL' :
						mysql_real_escape_string((trim($collection->value)),$this->oConexion)).
						 $this->devuelve_apostrofe($collection->value).
							$separador;
			 }
		}
		return trim($sSQL, $separador);
	}
	
	private function devuelve_apostrofe($variable)
	{
		$apostrofe = "";	
		switch (true)
		 {
		 	case is_bool($variable):
		 	case is_double($variable):
		 	case is_float($variable):
		 	case is_int($variable):
		 	case is_integer($variable):
		 	case is_long($variable):
		 	case is_numeric($variable):
		 	case is_real($variable): $apostrofe = "'"; break;
			case is_string($variable): $apostrofe = "'"; break;
			default:$apostrofe=''; break;
		 }
		return $apostrofe;
	}
	
	public function existe_clave($tabla)
	{
		try
		 {
		 	$existe = false;
			$count = 0;
		 	$sSQL = "SELECT * FROM ".$tabla." WHERE ";
			$sSQL .= $this->devuelve_values($this->keys, " AND ", 0, 0);

			$this->Conectar();
			$result = $this->EjecutarConsulta($sSQL);
			$count = @mysql_num_rows($result);
			$this->Desconectar();
			
			($count>0) ? $existe=true : $existe = false;
			return $existe;
		 }
		catch (Exception $e)
		 {
			 //echo $e;
		 }	
	}

    //Obtiene el ID generado en la última consulta
	public function ultimoid()
	{
		try
		 {
			$id = @mysql_insert_id($this->oConexion);
			return $id;
		 }
		catch (Exception $e)
		 {
			 //echo $e;
		 }		
	}

	public function siguienteid($tabla, $id)
	{
		try
		 {		 	
		 	$sSQL = "SELECT ".$id." FROM ".$tabla." ORDER BY ".$id." DESC";
			$result = $this->EjecutarConsulta($sSQL);
			$result = @mysql_fetch_row($result);
			return $result[0];
		 }
		catch (Exception $e)
		 {
			 //echo $e;
		 }		
	}

	public function devuelve_combo($sSQL, $name, $valor, $descripcion, $habilitarselector, $selectedValue, $textSelector)
	{
		try
		 {
		 	$resultado = "";
			$this->Conectar();
			$result = $this->EjecutarConsulta($sSQL);
			$numfilas = @mysql_num_rows($result);

			$resultado = "<select name=\"".$name."\" id=\"".$name."\" >";
			
						
			while ($fila = @mysql_fetch_array($result))
			{
				$resultado .= "<option value='".($fila[$valor])."' ".($selectedValue == $fila[$valor] ? "selected=\"selected\"" : "")." title=\"".($fila[$descripcion])."\" >".
				($fila[$descripcion])."</option>";
			}
			if ($habilitarselector)
			 {
				$resultado .= "<option selected=\"selected\" value=\"0\">".($textSelector ? $textSelector : "Seleccione una Opción")."</option>";
			 }
			else
			 {
				$resultado .= " ";					 
			 }
			$resultado .= "</select>";
			 
			return $resultado;
		 }
		catch (Exception $e)
		 {
			 //echo $e;
		 }
	}
	
	

	public function guardalog($evento,$descripcion)
	{
		try
		 {	
            //0=>'Inici� Sesi�n',1=>'Acces�',2=>'Cre�',3=>'Elimin�',4=>'Modific�',5=>'Cancel�',6=>'Cerr� Sesi�n',7=>'Consult�'
		 	$eventos= array('Inició Sesión','Accesó','Creó','Eliminó','Modificó','Canceló','Cerró Sesión','Consultó','Activó');
		 	$fecha=date("Y-m-d");
			$hora=date("H:i:s");

			$this->setValue("evento", $eventos[$evento]);
			$this->setValue("usuario", $_SESSION['nombre_usuario']);
			$this->setValue("descripcion", $descripcion);
			$this->setValue("fecha", $fecha);
			$this->setValue("hora", $hora);
			$this->setValue("id_usuario", $_SESSION[id_usuario]);
			$this->insertar("log");
			return true;
		 }
		catch (Exception $e){
			 //echo $e;
		 }		
	}


	// FUNCIONES PRIVADAS
	public function LeerConfiguracion()
	{
		global $DB_NAME;
		try {
            if (empty($this->servidor) || empty($this->usuario) || empty($this->contrasena) || empty($this->basededatos)) {
                $this->servidor = DB_HOST;
                $this->usuario = DB_USER;
                $this->contrasena = DB_PASSWORD;
                $this->basededatos = DB_NAME;
            }
        }
		catch (Exception $e)
		 {
		 	//echo $e;
		 }
	}	
}

class collection
{
	var $key;
	var $value;
	var $tag;
	
	function __construct($key, $value)
	{
		$this->key = $key;
		$this->value = $value;
	}	
}

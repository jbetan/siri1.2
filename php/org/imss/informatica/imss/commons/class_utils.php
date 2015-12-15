<?php
	class Utils{




		public static $ARRAY_ROLE_USUARIO = array(
			10=>"admin-icon"
		);
		public static $TIPO_TEXTO = "TEXTO";
		public static $TIPO_FECHA = "FECHA";
		public static $TIPO_NUMERO = "NUMERO";
		public static function getFechasFromRange($rangeFecha){
			$arrayFecha = explode(' - ', $rangeFecha);
			
			if(is_array($arrayFecha) && count($arrayFecha) > 1){
				$fecha1 = self::convierteFechaAMysqlFecha($arrayFecha[0]);
				$fecha2 = self::convierteFechaAMysqlFecha($arrayFecha[1]);
				return array("fechaIni" => $fecha1, "fechaFin" => $fecha2);
			}
			return array("fechaIni" => "", "fechaFin" => "");
		}
		public static function convierteFechaAMysqlFecha($fechaConDiagonales){
			$fecha1OnArray = explode('/', $fechaConDiagonales);
			if(is_array($fecha1OnArray) && count($fecha1OnArray) > 2){
				return $fecha1OnArray[2].'-'.$fecha1OnArray[1].'-'.$fecha1OnArray[0];
			}
			return "";
		}
		
		public static function getFechasFromRangeCompletas($rangeFecha){
			//return array($rangeFecha);
			$arrayFecha = explode(' - ', $rangeFecha);
			if(is_array($arrayFecha) && count($arrayFecha) > 1){
				if($arrayFecha[0] || $arrayFecha[1]) {
					$fecha1 = self::convierteFechaAMysqlFechaInicial($arrayFecha[0]);
					$fecha2 = self::convierteFechaAMysqlFechaFinal($arrayFecha[1]);
					return array("fechaIni" => $fecha1, "fechaFin" => $fecha2);
				}
			}
			return array("fechaIni" => "", "fechaFin" => "");
		}
		
		public static function convierteFechaAMysqlFechaInicial($fechaConDiagonales){
			$fecha1OnArray = explode('/', $fechaConDiagonales);
			if(is_array($fecha1OnArray) && count($fecha1OnArray) > 2){
				return $fecha1OnArray[2].'-'.$fecha1OnArray[1].'-'.$fecha1OnArray[0]." 00:00:00";
			}else{
				return ($fechaConDiagonales ? $fechaConDiagonales : "0000-00-00")." 00:00:00";
			}
		}
		
		public static function convierteFechaAMysqlFechaFinal($fechaConDiagonales){
			$fecha1OnArray = explode('/', $fechaConDiagonales);
			if(is_array($fecha1OnArray) && count($fecha1OnArray) > 2){
				return $fecha1OnArray[2].'-'.$fecha1OnArray[1].'-'.$fecha1OnArray[0]." 23:59:59";
			}
			return ($fechaConDiagonales ? $fechaConDiagonales." 23:59:59" : "NOW()");
		}
		
		public static function getComplementDataTableQuery($cols, $columns, $orders, $start, $length, $search){
			$numColumn = count($columns);
			$globalSearch = $search;
			$where = " ";
			$whereOR = "";
			for($i = 0; $i < $numColumn; $i++){
				if($columns[$i]["searchable"]){
					switch($cols[$i]["tipo"]){
						case Utils::$TIPO_TEXTO:{
							{
								$where.=" AND convert(cast(convert(".$cols[$i]["nombre"]." using  latin1) as binary) using utf8) like '%".utf8_decode($columns[$i]["search"]["value"])."%'";
							}
							break;
						}
						case Utils::$TIPO_NUMERO:{
                            if ($columns[$i]["search"]["value"]) {
                                $where .= " AND " . $cols[$i]["nombre"] . " = " . $columns[$i]["search"]["value"] . "";
                            }
							break;
						}
						case Utils::$TIPO_FECHA: {
							if ($columns[$i]["search"]["value"]){
								$range = self::getFechasFromRangeCompletas(str_replace($columns[$i]["search"]["range"], ' - ', $columns[$i]["search"]["value"]));
								if ($range["fechaIni"] != "" && $range["fechaFin"] != "") {

									$where .= " AND " . $cols[$i]["nombre"] . " BETWEEN '" . $range["fechaIni"]."'" .($range["fechaFin"] == "NOW()" ? " AND ".$range["fechaFin"] : " AND '" . $range["fechaFin"] . "'");
								}
							}
							break;
						}
					}
				}
				if($columns[$i]["searchable"] && $globalSearch != "" && $cols[$i]){
					if($whereOR == "")
						$whereOR .= "  AND (convert(cast(convert(".$cols[$i]["nombre"]." using  latin1) as binary) using utf8) like '%".utf8_decode($globalSearch)."%'";
					else
						$whereOR .= " OR convert(cast(convert(".$cols[$i]["nombre"]." using  latin1) as binary) using utf8) like '%".utf8_decode($globalSearch)."%'";
				}
			}
			$orderBY = "";
			if($orders[0] && $orders[0]["column"] >= 0 ){
				$orderBY = "ORDER BY ".($cols[$orders[0]["column"]]["nombre"]." ".$orders[0]["dir"]);
			}
			
			if($whereOR != ""){
				$whereOR .= ")";
			}
			return $where .= $whereOR.($orderBY ? $orderBY : "").($length == "-1" ? "" : " LIMIT ".$start.", ".$length);
			 
		}

        public static  function d($ar){

            print_r($ar);



        }

		public static function getComplementDataTableQuery2($cols, $request){
			
			$numColumn = $request["iColumns"];
			$globalSearch = $request["sSearch"];
			$where = " ";
			$whereOR = "";
			
			for($i = 0; $i < $numColumn; $i++){
				if($request["sSearch_".$i] != ""){
					if($i == 0){
						$where.=" AND ".$cols[$i+$numColumn]." LIKE '%".$request["sSearch_".$i]."%'";
					}
				}
				if($globalSearch != "" && $cols[$i+$numColumn]){
					if($whereOR == "")
						$whereOR .= "  AND (".$cols[$i+$numColumn]." like '%".$globalSearch."%'";
					else
						$whereOR .= " OR ".$cols[$i+$numColumn]." like '%".$globalSearch."%'";
				}
			}
			$orderBY = "";
			if($request["iSortingCols"] ){
				$orderBY = "ORDER BY ".($cols[$request["iSortCol_0"]]." ".$request["sSortDir_0"]);
			}
			
			if($whereOR != ""){
				$whereOR .= ")";
			}
			return $where .= $whereOR.($orderBY ? $orderBY : "");
			 
		}
	}
?>
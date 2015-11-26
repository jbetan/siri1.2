<?php
/**
 * User: Renan
 * Date: 05/05/2015
 * Time: 04:25 PM
 */

include_once(dirname(__FILE__)."/../../commons/class_mysqlconnector.php");
class ClassMenu extends class_mysqlconnector {

    private $usuario = "";
    private $menu = array();

    private function getHijos($idPadre, $nivel){
        $menuFinal = array();
        $indicePapa = 0;
        foreach($this->menu as $papa){
            if($papa["id_padre"] == $idPadre){
                $menuFinal[$indicePapa] = $papa;
                $indicePapa++;
            } elseif($nivel < $papa["nivel"]) {
                $menuFinal[$indicePapa-1]["sons"] = $this->getHijos($menuFinal[$indicePapa-1]["id"], $papa["nivel"]);
            }
        }
        return $menuFinal;
    }

    private function setFormatMenu(){
        $menuFinal  = array();
        $hijos      = array();
        $idpadre    = null;
        $indicePapa = 0;
        foreach($this->menu as $papa){
            if($papa["id_padre"] == null){
                $menuFinal[$indicePapa] = $papa;
                $indicePapa++;
            }else{
                $menuFinal[$indicePapa-1]["sons"] = $this->getHijos($menuFinal[$indicePapa-1]["id"], $papa["nivel"]);
            }
        }
        $this->menu = $menuFinal;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function getMenuByUsuario($menuSession, $path) {
        
        switch($menuSession){           
          
            

            case "Responsable de unidad": //0
                $this->menu = file_get_contents($path."template/menu/menuSiri/responsable_unidad.json");
                break;

            case "Call Center": // 1
                $this->menu = file_get_contents($path."template/menu/menuSiri/callcenter.json");
                break;

            case "Mesa de recepcion": //1
                $this->menu = file_get_contents($path."template/menu/menuSiri/mesaderecepcion.json");
                break;

            case "Auxiliar": //2
                $this->menu = file_get_contents($path."template/menu/menuSiri/auxiliar.json");
                break;

            case "Oficial": //3
                $this->menu = file_get_contents($path."template/menu/menuSiri/oficial.json");
                break;

            case "Especialista": //4
                $this->menu = file_get_contents($path."template/menu/menuSiri/especialista.json");
                break;

            case "Garantia": //5
                $this->menu = file_get_contents($path."template/menu/menuSiri/garantia.json");
                break;
            
            case "Jefe de oficina": //6
                $this->menu = file_get_contents($path."template/menu/menuSiri/jefedeoficina.json");
                break;

            case "Coordinador": //6
                $this->menu = file_get_contents($path."template/menu/menuSiri/coordinador.json");
                break;

            case "Administrador": //7
                $this->menu = file_get_contents($path."template/menu/menuSiri/admin.json");
                break;  
     
                       
            default: //jaja
                $this->menu = file_get_contents($path."template/menu/menuSiri/admin.json");
                break;
        }
        return $this->menu;
    }

    public function bufferMenuJSON(){
        header('Content-Type: application/json');
        exit(json_encode($this->menu));
    }


}
?>
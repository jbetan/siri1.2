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

          

            case "ADMIN":
                $this->menu = file_get_contents($path."template/menu/Administrador_7/admin.json");
                break;

           /* 

             case "ADMIN":
                $this->menu = file_get_contents($path."template/menu/asignacion.json");
                break;

            case "SOPORTEB":
            case "SOPORTEA":
                $this->menu = file_get_contents($path."template/menu/menu2.json");
                break;
            case "TELECOM":
                $this->menu = file_get_contents($path."template/menu/menu_3.json");
                break;

            case "OTRO":
                $this->menu = file_get_contents($path."template/menu/control.json");
                break;

            case "ASIGNACION":
                $this->menu = file_get_contents($path."template/menu/asignacion.json");
                break;
            */
            default:
                $this->menu = file_get_contents($path."template/menu/menu.json");
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
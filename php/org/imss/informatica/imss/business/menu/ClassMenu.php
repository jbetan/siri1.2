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
        $menuFinal = array();
        $hijos = array();
        $idpadre = null;
        $indicePapa = 0;
        foreach($this->menu as $papa){
            if($papa["id_padre"] == null){
                $menuFinal[$indicePapa] = $papa;
                $indicePapa++;
            } else {
                $menuFinal[$indicePapa-1]["sons"] = $this->getHijos($menuFinal[$indicePapa-1]["id"], $papa["nivel"]);
            }
        }
        $this->menu = $menuFinal;

    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getMenuByUsuario($menuSession, $path) {
        switch($menuSession){
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


            default:
                $this->menu = file_get_contents($path."template/menu/menu.json");
                break;
        }

//        if(isset($menuSession) || $menuSession != null){
//            $this->menu = $menuSession;
//        } else {
//            $this->setKey("id_usuario", $this->usuario);
//            $roles = $this->devuelve_filas("role_usuario", "id_role");
//            $rolesStr = "";
//            foreach ($roles as $rol) {
//                $rolesStr .= ($rolesStr ? "," : "") . $rol["id_role"];
//            }
//            $sql = "SELECT * FROM menu INNER JOIN menu_role ON menu_role.id_menu = menu.id WHERE menu_role.id_role IN (" . $rolesStr . ") ORDER BY menu.indice , menu.nivel ";
//            $res = $this->EjecutarConsulta($sql);
//            $this->menu = array();
//            while ($row = mysql_fetch_assoc($res)) {
//                $this->menu[] = $row;
//            }
//            $this->setFormatMenu();
//        }
        return $this->menu;
    }

    public function bufferMenuJSON(){
        header('Content-Type: application/json');
        exit(json_encode($this->menu));
    }


}
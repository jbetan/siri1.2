<?php
/**
 * User: Renan
 * Date: 14/04/2015
 * Time: 02:45 AM
 */
error_reporting(0);
ini_set("error_reporting", 0);
class ControllerPrincipal {

    private $_route = "";
    private $title = "";
    private $_absPath = "C:\\xampp\\htdocs\\siri1.2\\web\\";
    private $contextPath = "/siri1.2";
    private $opcionMenu = "";

    function __construct($route = "", $title = "")
    {
        $this->_route = $route;
        $this->title = $title;
    }

    public function getAbsPath(){
        return $this->_absPath;
    }

    /**
     * @return string
     */
    public function getOpcionMenu()
    {
        return $this->opcionMenu;
    }

    /**
     * @param string $opcionMenu
     */
    public function setOpcionMenu($opcionMenu)
    {
        $this->opcionMenu = $opcionMenu;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->_route;
    }

    /**
     * @param string $route
     */
    public function setRoute($route)
    {
        $this->_route = $route;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function page(){
        echo "page";
        include($this->_absPath.$this->_route);
    }

    public function validaAcceso(){
        //Se valida la session o los permisos de acceso
        if($_SESSION["imss"]["acceso"] == 1) {
            return true;
        } else {
            return $this->fromLogin();
        }
    }

    public function fromLogin(){
        //Valida si estas logueado
        if(isset($_REQUEST["username"]) && isset($_REQUEST["password"])) {
            //Valida en base de datos Si datos correctos
            include_once(dirname(__FILE__)."/../business/security/class_seguridad.php");    //el dirname toma la posicion del archivo que estas trabajando y el __FILE__ reconoce el archivo
            $security = new class_seguridad();
            $_SESSION["imss"] = $security->getAcceso($_REQUEST["username"], $_REQUEST["password"]);
            if($_SESSION["imss"]["acceso"] == 1) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

}
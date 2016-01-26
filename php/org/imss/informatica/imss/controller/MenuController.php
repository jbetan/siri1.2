<?php
/**
 * User: Renan
 * Date: 05/05/2015
 * Time: 06:13 PM
 */
session_name("EnterAccessCFERecibos");
session_start();
include_once("../business/menu/ClassMenu.php");
include_once("ControllerPrincipal.php");


class MenuController extends ControllerPrincipal {

    function getMenuByUsuario($menuType){
        $menu = new ClassMenu();       
        return $menu->getMenuByUsuario($menuType, $this->getAbsPath());
    }
}


$menu = new MenuController();
echo  $menu->getMenuByUsuario($_SESSION["imss"]["niv_usuario"]);
session_write_close();
//$menu->bufferMenuJSON();
<?php
/**
 * Created by PhpStorm.
 * User: Brayan
 * Date: 10/07/2015
 * Time: 05:01 PM
 */
include_once("ControllerPrincipal.php");
class PaginaController extends  ControllerPrincipal{

}

$Paginapage=  new PaginaController("levantamiento/pagina.php", "Atencion a Usuarios - Pagina");
$Paginapage->page();
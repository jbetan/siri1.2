<?php
/**
 * User: Renan
 * Date: 14/04/2015
 * Time: 02:51 AM
 */

include_once("ControllerPrincipal.php");

class LoginController extends ControllerPrincipal{

    private $actionForm = "";

    /**
     * @return string
     */
    public function getActionForm()
    {
        return $this->actionForm;
    }

    /**
     * @param string $actionForm
     */
    public function setActionForm($actionForm)
    {
        $this->actionForm = $actionForm;
    }

}

$loginPage = new LoginController("login/login.php", "ADMIN CONTRARECIBOS - Login");
//$loginPage->validateAccess();
session_name("EnterAccessCFERecibos");
session_start();

if(!isset($_SESSION["actionForm"])) {
    session_destroy();
    $loginPage->setActionForm("index");
} else {
    $loginPage->setActionForm($_SESSION["actionForm"]);
}
$loginPage->page();
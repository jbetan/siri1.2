<?php
// CLASE PARA LAS EXCEPCIONES
class class_exception extends Exception
{
	var $funcion;
	
    public function __construct($message, $code = 0, $funcion = null) {
		$this->funcion = $funcion;
        parent::__construct($message, $code);
    }

    public function __toString() {
        return __CLASS__ . ": Ocurri&oacute; una excepci&oacute;n<br />".
		"==========================================="."<br />".
		"Funci&oacute;n : ".$this->funcion."<br />".
		"Error &nbsp;&nbsp;&nbsp;&nbsp;: ".$this->message."<br />".
		"C&oacute;digo &nbsp;: ".$this->code."<br />".
		"Origen &nbsp;&nbsp;: ".$this->file."<br />".
		"L&iacute;nea &nbsp;&nbsp;&nbsp;&nbsp;: ".$this->line."<br />";
    }
}

?>
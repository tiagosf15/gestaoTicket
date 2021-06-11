<?php
class Controller
{

    
    function __construct()
    {
        if (isset($_REQUEST['comando'])) {
            $comando = $_REQUEST['comando'];
            if (method_exists($this, $comando)) {
                $this->$comando(); 
                    
            } 
        }
    }
}

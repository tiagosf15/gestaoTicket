<?php
include_once('model/Tikets_cadastro.php');
require_once('controller.php');
class TicketController  extends Controller
{

    

    function lsTabala()
    {
   
    
       $n = new Tikets_cadastro();
        
       echo json_encode($n->pegar());
       die; 
    }
}

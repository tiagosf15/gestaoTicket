<?php
session_start();
include_once('model/Tikets_cadastro.php');
include_once('model/Cadastrar_Tikets.php');
include_once('model/delete.php');
include_once('model/editar.php');
require_once('controller.php');
class TicketController  extends Controller
{

    

    function lsTabala()
    {
   
    
       $n = new Tikets_cadastro();
        
       echo json_encode($n->pegar());
       die; 
    }

    function Cadastrar(){
        $c = new Cadastrar_Tikets();
        $c->cadastrar();
        exit;
    }


    function Delete(){
        $k = new delete();
        $k->delete();
        die;
    }

    function Editar(){
        $k = new editar();
        $k->editar();
    }
    function procurar(){
        $m = new Tikets_cadastro();
        $m->procurar();
        die;
    }
    function resultado(){
        $m = new Tikets_cadastro();
        echo json_encode($m->resultado());
        die;
    }
}
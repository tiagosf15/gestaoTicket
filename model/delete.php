<?php

require_once 'ConexaoTikets.php';
class delete extends Conexao_Tikets
{

    public function __construct()
    {
        parent::__construct();
    }

    public function delete(){
        if(!empty($_POST["codigo1"])){
        $codigo = $_POST["codigo1"];
        $step=$this->db->prepare("DELETE FROM `tickts` WHERE tick_codigo = $codigo");
        
        $step->execute();
        print_r($codigo);
        }
        
    }




}
    ?>
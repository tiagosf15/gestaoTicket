<?php

require_once 'ConexaoTikets.php';
class editar extends Conexao_Tikets
{

    public function __construct()
    {
        parent::__construct();
    }

    function editar(){
        if(!empty($_POST["descricao"])){
         $descricao = $_POST["descricao"];
         $tema= $_POST["tema"];
         $redmine = $_POST["codigoredme"];
         $codigo = $_POST["tick_codigo"];
         $sql = "UPDATE `tickts` SET `tick_codigoredmine`= '$redmine',`tick_tema`='$tema',`tick_descricao`='$descricao' WHERE `tick_codigo`=$codigo";
         print_r($_POST);
         $stmt= $this->db->prepare($sql);
         $stmt->execute([$redmine,$tema, $descricao, $codigo]);
        }
    }
    
    
}
    ?>
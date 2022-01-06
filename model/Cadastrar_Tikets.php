<?php

require_once 'ConexaoTikets.php';
class Cadastrar_Tikets extends Conexao_Tikets
{

    public function __construct()
    {
        parent::__construct();
    }

    public function cadastrar()
    {
        if (!empty($_POST["assunto"]) && !empty($_POST["descricao"]) && !empty($_POST["codigoredme"])) {
            $assunto = $_POST["assunto"];
            $descricao = $_POST["descricao"];
            $codigoredme = $_POST["codigoredme"];
            
            $data = [
                'tick_tema' => $assunto,
                'tick_descricao' => $descricao,
                'tick_codigoredmine' => $codigoredme
            ];
            print_r($data);

            $sql = "INSERT INTO tickts (tick_tema, tick_descricao, tick_codigoredmine) VALUES (:tick_tema, :tick_descricao, :tick_codigoredmine)";
            $stmt = $this->db->prepare($sql);
            foreach($data as $key => $value){
            $stmt->bindValue("$key",$value);  
          }
            $stmt->execute();
           
        }
    }

    public function getdb()
    {
        return $this->db;
    }
    public function setdb($db)
    {
        $this->db = $db;
    }
}

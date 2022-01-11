<?php
require_once 'ConexaoTikets.php';

class Tikets_cadastro extends Conexao_Tikets
{

    public function __construct()
    {
        parent::__construct();
    }

    public function pegar()
    {

        $tikets = "SELECT *,  DATE_FORMAT(tick_datacadastro, '%d/%m/%Y') AS data  from tickts order by tick_tema ";


        if (!empty($_POST["assunto"]) || (!empty($_POST["dataI"]) && !empty($_POST["dataf"])) || !empty($_POST["codigo"])) {
            $tikets1 = $_POST["assunto"];
            $tikets = "SELECT *, DATE_FORMAT(tick_datacadastro, '%d/%m/%Y') AS data FROM tickts WHERE tick_tema LIKE '%$tikets1%'";
           
        }
        if (!empty($_POST["dataI"]) && !empty($_POST["dataf"]) ) {
            $dataI = $_POST["dataI"];
            $dataf = $_POST["dataf"];
            $tikets = "SELECT *, DATE_FORMAT(tick_datacadastro, '%d/%m/%Y') AS data FROM tickts WHERE tick_datacadastro BETWEEN '$dataI' AND '$dataf'";
        } if(!empty($_POST["codigo"])) {
            $codigo = $_POST["codigo"];
            $tikets = "SELECT *, DATE_FORMAT(tick_datacadastro, '%d/%m/%Y') AS data FROM tickts WHERE tick_codigoredmine LIKE '%$codigo%'";
        }


        if (!empty($_POST["assunto"]) && !empty($_POST["dataI"]) && !empty($_POST["dataf"]) && !empty($_POST["codigo"])) {
            $tikets1 = $_POST["assunto"];
            $dataI = $_POST["dataI"];
            $dataf = $_POST["dataf"];
            $codigo = $_POST["codigo"];
            $tikets = "SELECT *, DATE_FORMAT(tick_datacadastro, '%d/%m/%Y') AS data FROM tickts WHERE tick_datacadastro BETWEEN '$dataI' AND '$dataf' AND tick_tema LIKE '%$tikets1%' AND tick_codigoredmine = '$codigo'";
        }

        if (!empty($_POST["dataI"]) && !empty($_POST["dataf"]) && !empty($_POST["codigo"])) {
            $dataI = $_POST["dataI"];
            $dataf = $_POST["dataf"];
            $codigo = $_POST["codigo"];
            $tikets = "SELECT *, DATE_FORMAT(tick_datacadastro, '%d/%m/%Y') AS data FROM tickts WHERE tick_datacadastro BETWEEN '$dataI' AND '$dataf' AND tick_codigoredmine LIKE '%$codigo%'";
        }

        if (!empty($_POST["assunto"]) && !empty($_POST["dataI"]) && !empty($_POST["dataf"])) {
            $tikets1 = $_POST["assunto"];
            $dataI = $_POST["dataI"];
            $dataf = $_POST["dataf"];
            $tikets = "SELECT *, DATE_FORMAT(tick_datacadastro, '%d/%m/%Y') AS data FROM tickts WHERE tick_datacadastro BETWEEN '$dataI' AND '$dataf' AND tick_tema LIKE '%$tikets1%'";
        }

        if (!empty($_POST["assunto"]) && !empty($_POST["codigo"])) {
            $tikets1 = $_POST["assunto"];
            $codigo = $_POST["codigo"];
            $tikets = "SELECT *, DATE_FORMAT(tick_datacadastro, '%d/%m/%Y') AS data FROM tickts WHERE tick_tema LIKE '%$tikets1%' AND tick_codigoredmine LIKE '%$codigo%'";
        }
      
        $statement = $this->db->prepare($tikets);
        $statement->execute(); 
        $rowCount = $statement->rowcount();
        $result = $statement->fetchAll();
        return $result;


        //$datai = $_POST['dataI'];
        //$dataf = $_POST['dataf'];
    }



    function procurar()
    {
        if (!empty($_POST["codigo2"])) {
            $tikets1 = $_POST["codigo2"];
            $tikets = "SELECT * FROM tickts WHERE tick_codigo = '$tikets1'";

            $statement = $this->db->prepare($tikets);
            $statement->execute();

            $result = $statement->fetchAll();
            $_SESSION["result"] = $result;
            return $result;
        }
    }
    function resultado()
    {

        return $_SESSION["result"];
    }
}

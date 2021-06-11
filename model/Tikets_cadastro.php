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


        if (isset($_POST["assunto"])) {
            $tikets = $_POST['assunto'];
            $datai = $_POST['dataI'];
            $dataf = $_POST['dataf'];

            $tikets = "SELECT *, DATE_FORMAT(tick_datacadastro, '%d/%m/%Y')  AS date FROM tickts WHERE tick_tema LIKE '%$tikets%' AND tick_datacadastro BETWEEN '$datai' AND '$dataf'";
        } else {
            $tikets = "SELECT *,  DATE_FORMAT(tick_datacadastro, '%d/%m/%Y') AS data  from tickts order by tick_tema ";
        }


        $statement = $this->db->prepare($tikets);
        $statement->execute();

        $rowCount = $statement->rowcount();
        $result = $statement->fetchAll();

        return $result;


        //$datai = $_POST['dataI'];
        //$dataf = $_POST['dataf'];
    }
}

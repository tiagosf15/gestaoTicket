<?php 
require_once 'ConexaoTikets.php';
class Tikets_cadastro extends Conexao_Tikets{

    public function __construct()
    {
        parent::__construct();
    }

public function pegar(){
   
   
     if(isset($_POST["assunto"])){
     $tikets = $_POST['assunto'];
     $datai= $_POST['dataI'];
     $dataf= $_POST['dataf'];

    $tikets = "SELECT * FROM tickts WHERE tick_tema LIKE '%$tikets%' AND tick_datacadastro BETWEEN '$datai' AND '$dataf'"; 
   }else{
        $tikets = "select * from tickts order by tick_tema ";
    }
    

    $statement = $this->db->prepare($tikets);
    $statement ->execute();
    
    $rowCount = $statement->rowcount();
    $result = $statement ->fetchAll();


    if ($rowCount > 0) {
        $data = '<div class="table-responsive">
            <table class="table bordered">
            <tr>
            <th>Codigo</th>
                <th>assunto</th>
                <th>Descrição</th>
                <th>Data do tick</th>
                
            </tr>
        '; 
        foreach($result as $row) {
            $data .= '
                <tr>
                <td>'.$row["tick_codigoredmine"].'</td>
                    <td>'.$row["tick_tema"].'</td>
                    <td>'.$row["tick_descricao"].'</td>
                    <td>'.$row["tick_datacadastro"].'</td>
                    
                    </tr>
            ';
        }
        $data .= '</table></div>';
    }
    else {
        $data = "Nenhum registro localizado.";
    }
    
    echo $data;
    
    //$datai = $_POST['dataI'];
    //$dataf = $_POST['dataf'];
}











}








?>
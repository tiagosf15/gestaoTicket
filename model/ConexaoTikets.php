<?php
class Conexao_Tikets{
 protected $db;


  public function __construct()
 {
    try{
    $this->db = new PDO ('mysql:host=localhost;dbname=tickts_base', 'root', '');
     
 
     $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    


    }catch(PDOException $e) {
        echo 'ERROR: ' .$e->getMessage();
    }
}
  




}



?>
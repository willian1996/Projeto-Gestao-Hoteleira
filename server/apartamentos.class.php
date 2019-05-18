<?php
require_once 'conexao.class.php';

class Apartamentos extends Conexao{
    public function getApartamentos(){
        $array = array();

        $sql = "SELECT * FROM apartamentos order by numero";
        $sql = $this->pdo->query($sql);

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }
}
    
?>
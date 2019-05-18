<?php
require_once 'conexao.class.php';

class Reservas extends Conexao{
    
    public function getReservas(){
        $array = array();
        
        $sql = "SELECT hospedes.id, hospedes.nome_completo, apartamentos.numero, reservas.*, funcionarios.nome 
        FROM hospedes
        JOIN reservas 
        ON hospedes.id = reservas.id_hospede
        JOIN apartamentos 
        ON apartamentos.id = reservas.id_apartamento
        JOIN funcionarios 
        ON funcionarios.id = hospedes.id_funcionario";
        $sql = $this->pdo->query($sql);
        
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    
    
}
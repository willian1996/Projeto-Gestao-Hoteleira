<?php

class Hospede{
    private $pdo;
    
    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    
    public function adicionarHospede($nome_completo, $CPF, $email, $celular){
        
        if(!$this->existeEmail($email) and !$this->existeCPF($CPF)){
            $sql = "INSERT INTO hospedes (nome_completo, CPF, email, celular) VALUES (:nome_completo, :CPF, :email, :celular)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome_completo", $nome_completo);
            $sql->bindValue(":CPF", $CPF);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":celular", $celular);
            $sql->execute();
            
            return true;
        }else{
            return false;
        }
        
    }
    
//    public function getAll()
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function existeEmail($email){
        $sql = "SELECT * FROM hospedes WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function existeCPF($CPF){
        $sql = "SELECT * FROM hospedes WHERE CPF = :CPF";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":CPF", $CPF);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    
    
    
    
    
}
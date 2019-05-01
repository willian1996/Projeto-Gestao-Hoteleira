<?php

class Hospede{
    private $pdo;
    
    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    
    public function adicionarHospede($nome_completo, $CPF, $email, $celular, $telefone){
        
        if(!$this->existeEmail($email) and !$this->existeCPF($CPF)){
            $sql = "INSERT INTO hospedes (nome_completo, CPF, email, celular, telefone) VALUES (:nome_completo, :CPF, :email, :celular, :telefone)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome_completo", $nome_completo);
            $sql->bindValue(":CPF", $CPF);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":celular", $celular);
            $sql->bindValue(":telefone", $telefone);
            $sql->execute();
            
            if($sql->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
        
    }
    
    public function listarHospedes(){
        $sql = "SELECT * FROM hospedes";
        $sql = $this->pdo->query($sql);
        
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }else{
            return array();
        }
    }
    
    public function infoHospede($id){
        $sql = "SELECT * FROM hospedes WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            return $sql->fetch();
        }else{
            return array();
        }
    }
    
    public function infoHospedePorEmail($email){
        $sql = "SELECT * FROM hospedes WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            return $sql->fetch();
        }else{
            return array();
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
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
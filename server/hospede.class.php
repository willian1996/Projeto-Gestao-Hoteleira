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
        $sql = "SELECT * FROM hospedes WHERE status = 1";
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
    
    
    public function editarHospede($id, $nome_completo, $CPF, $email, $celular, $telefone){
        
        if($nome_completo == '' or $CPF == '' or $email == '' or $celular == '' or $telefone == ''){
            $retorno['deucerto'] = false;
            $retorno['mensagem'] = "Erro! os campos não podem estar vazio!";
            return $retorno;
        }
        
        if($this->existeEmail($email, $id)){
            $retorno['deucerto'] = false;
            $retorno['mensagem'] = "Erro! E-mail já está em uso em outro registro!";
            return $retorno;
        }
        if($this->existeCPF($CPF, $id)){
            $retorno['deucerto'] = false;
            $retorno['mensagem'] = "Erro! CPF já está em uso em outro registro!";
            return $retorno;
        }
        try{
            $sql = "UPDATE hospedes SET nome_completo = :nome_completo, CPF = :CPF, email = :email, celular = :celular, telefone = :telefone WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->bindValue(":nome_completo", $nome_completo);
            $sql->bindValue(":CPF", $CPF);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":celular", $celular);
            $sql->bindValue(":telefone", $telefone);
            $sql->execute();
            
            if($sql->rowCount() > 0){
                $retorno['deucerto'] = true;
                $retorno['mensagem'] = "hospede editado com sucesso!";
                return $retorno;
            }else{
                $retorno['deucerto'] = false;
                $retorno['mensagem'] = "Não Alterado";
                return $retorno;
            }
        }catch(PDOException $e){
            $retorno['deucerto'] = false;
            $retorno['mensagem'] = "Erro ".$e->getMessage();
            return $retorno;
        }
            
    }
    
    public function excluirHospede($id){
        $sql = "UPDATE hospedes SET status = '0' WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $retorno['deucerto'] = true;
            $retorno['mensagem'] = "Hospede excluído!";
            return $retorno;
        }else{
            $retorno['deucerto'] = false;
            $retorno['mensagem'] = "Erro no servidor!";
            return $retorno;
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    private function existeEmail($email, $id=''){
        if($id == ''){
            $sql = "SELECT * FROM hospedes WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":email", $email);
        }else{
            $sql = "SELECT * FROM hospedes WHERE email = :email and id != :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":id", $id);
        }
        $sql->execute();
        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    private function existeCPF($CPF, $id=''){
        if($id == ''){
            $sql = "SELECT * FROM hospedes WHERE CPF = :CPF";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":CPF", $CPF);
        }else{
            $sql = "SELECT * FROM hospedes WHERE CPF = :CPF and id != :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":CPF", $CPF);
            $sql->bindValue(":id", $id);
        }
        $sql->execute();  
        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    private function filtraEntrada($campo){
        $campo = trim($campo); // remove espaços no início e no final
        $campo = strip_tags($campo); // remove tags html
        $campo = addslashes($campo); // adiciona caractere de escape nas aspas e apostófros
        return $campo;
    }
    
    
    
    
    
    
}
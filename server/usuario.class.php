<?php
require_once 'conexao.class.php';

class Usuario extends Conexao{
    private $id;
    private $email;
    private $senha;
    private $nome;
    
    
    
    public function infoUsuario($id){
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $data = $sql->fetch();
            $this->setId($data['id']);
            $this->setEmail($data['email']);
            $this->setSenha($data['senha']);
            $this->setNome($data['nome']);            
        }
    }
    
    public function setId($id){
        $this->id = $id;
    }
    public function setEmail($e){
        $this->email = $e;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setSenha($s){
        $this->senha = sha1($s);
    }
    
    public function setNome($n){
        $this->nome = $n;
    }
    public function getNome(){
        return $this->nome;
    }
    
    public function salvar(){
        if(!empty($this->id)){
            $sql = "UPDATE usuarios SET email = :email, senha = :senha, nome = :nome WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":email", $this->email);
            $sql->bindValue(":senha", $this->senha);
            $sql->bindValue(":nome", $this->nome);
            $sql->bindValue(":id", $this->id);
            $sql->execute();
        }else{
            $sql = "INSERT INTO usuarios SET email = :email, senha = :senha, nome = :nome";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":email", $this->email);
            $sql->bindValue(":senha", $this->senha);
            $sql->bindValue(":nome", $this->nome);
            $sql->execute();
        }
        
    }
    
}/*Fim Classe Usuario*/
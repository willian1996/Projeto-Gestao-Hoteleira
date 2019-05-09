<?php
require_once 'conexao.class.php';

class Funcionario extends Conexao{
    
    
    private $nome;
    private $email;
    private $senha;
    private $idFuncionario;
    private $dataCadastro;
    
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
    
    public function __get($atributo){
        return $this->$atributo;
    }
    
    public function selecionar($dado){
        try{
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id", $idFuncionario);
            $sql->execute();
            return $sql->fetch();
            
        }catch(PDOException $e){
            return "Erro! ".$e->getMessage();
        }
    }
    
    public function listar(){
        try{
            $sql = "SELECT * FROM usuarios";
            $sql = $this->pdo-prepare($sql);
            $sql>execute();
            return $sql->fetchAll();
            
        }catch(PDOException $e){
            return "Erro! ".$e->getMessage();
        }
    }
    
    public function inserir($dados){
        $this->nome = $this->filtraEntrada($dados['nome']);
        $this->email = $this->filtraEntrada($dados['email']);
        $this->senha = $this->filtraEntrada(sha1($dados['senha']));
        $this->dataCadastro = $this->dataAtual();
        try{
            $sql = "INSERT INTO usuarios (nome, email, senha, dataCadastro) values (:nome, :email, :senha, :dataCadastro)";
            $sql = $this->pdo->prepare($sql);
            $sql->
            
        }catch(PDOException $e){
            return "Erro! ".$e->getMessage();
        }
    }
    
    public function atualizar($dados){
        try{
            
        }catch(PDOException $e){
            
        }
    }
    
    public function deletar($dados){
        try{
            
        }catch(PDOException $e){
            
        }
    }
    
    
    
    
    
    
    
}



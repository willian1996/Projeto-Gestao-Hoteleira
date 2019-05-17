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
    
    public function inserirFuncionario($dados){
        $this->nome = $this->filtraEntrada($dados['nome']);
        $this->email = $this->filtraEntrada($dados['email']);
        $this->senha = $this->filtraEntrada(sha1($dados['senha']));
        $this->dataCadastro = $this->dataAtual();
        try{
            $sql = "INSERT INTO funcionarios (nome, email, senha, dataCadastro) values (:nome, :email, :senha, :dataCadastro)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $this->nome);
            $sql->bindValue(":email", $this->email);
            $sql->bindValue(":senha", $this->senha);
            $sql->bindValue(":dataCadastro", $this->dataCadastro);
            $sql->execute();
            
            if($sql->rowCount() > 0){
                $retorno['deucerto'] = true;
                $retorno['mensagem'] = "funcionário cadastrado com sucesso!";
                return $retorno;
            }else{
                $retorno['deucerto'] = false;
                $retorno['mensagem'] = "Erro! nao cadastrado";
                return $retorno;
            }
            
        }catch(PDOException $e){
            $retorno['deucerto'] = false;
            $retorno['mensagem'] = "Erro no servidor";
            return $retorno;
        }
    }
    
    public function listarFuncionarios(){
        try{
            $sql = "SELECT * FROM funcionarios";
            $sql = $this->pdo->prepare($sql);
            $sql->execute();
            return $sql->fetchAll();
            
        }catch(PDOException $e){
            return "Erro! ".$e->getMessage();
        }
    }
    
    
    public function selecionarFuncionario($dados){
        $this->idFuncionario = $this->filtraEntrada($dados['id']);
        try{
            $sql = "SELECT * FROM funcionarios WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id", $this->idFuncionario);
            $sql->execute();
            return $sql->fetch();
            
        }catch(PDOException $e){
            return "Erro! ".$e->getMessage();
        }
    }
    
    
    public function atualizarFuncionario($dados){
        $this->idFuncionario = $this->filtraEntrada($dados['id']);
        $this->nome = $this->filtraEntrada($dados['nome']);
        $this->email = $this->filtraEntrada($dados['email']);
        $this->senha = $this->filtraEntrada(sha1($dados['senha']));
        $this->dataCadastro = $this->dataAtual();
        try{
            $sql = "UPDATE funcionarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id", $this->idFuncionario);
            $sql->bindValue(":nome", $this->nome);
            $sql->bindValue(":email", $this->email);
            $sql->bindValue(":senha", $this->senha);
            $sql->execute();
            
            if($sql->rowCount() > 0){
                $retorno['deucerto'] = true;
                $retorno['mensagem'] = "funcionário editado com sucesso!";
                return $retorno;
            }else{
                $retorno['deucerto'] = false;
                $retorno['mensagem'] = "Não alterado!";
                return $retorno;
            }
        }catch(PDOException $e){
            $retorno['deucerto'] = false;
            $retorno['mensagem'] = "Erro no servidor!";
            return $retorno;
        }
    }
    
    public function deletarFuncionario($dados){
        $this->idFuncionario = $dados['id']; 
        try{
            $sql = "DELETE FROM funcionarios WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id", $this->idFuncionario);
            $sql->execute();
            
            if($sql->rowCount() > 0){
                $retorno['deucerto'] = true;
                $retorno['mensagem'] = "funcionário excluído com sucesso!";
                return $retorno;
            }else{
                $retorno['deucerto'] = false;
                $retorno['mensagem'] = "Não excluído";
                return $retorno;
            }
        }catch(PDOException $e){
            $retorno['deucerto'] = false;
            $retorno['mensagem'] = "Erro no servidor";
            return $retorno;
        }
    }
    
    public function logarFuncionario($dados){
        $this->email = $dados['email'];
        $this->senha = sha1($dados['senha']);

        try{
            $sql = "SELECT * FROM funcionarios WHERE email = :email and senha = :senha";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":email", $this->email);
            $sql->bindValue(":senha", $this->senha);
            $sql->execute();
            
            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $retorno['deucerto'] = true;
                $retorno['idFunc'] = $sql['id'];
                session_start();
                $_SESSION['idFunc'] = $sql['id'];
                $_SESSION['nomeFunc'] = $sql['nome'];
                $_SESSION['emailFunc'] = $sql['email'];
                return $retorno;
            }else{
                $retorno['deucerto'] = false;
                $retorno['mensagem'] = "E-mail ou senha inválidos!";
                return $retorno;
            }
        }catch(PDOException $e){
            $retorno['deucerto'] = false;
            $retorno['mensagem'] = "Erro no servidor!";
            return $retorno;
        }

    }
    
    
    
    
    
    
    
    
}/*FIM CLASSE Funcionario */
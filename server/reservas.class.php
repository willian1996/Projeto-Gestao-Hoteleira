<?php
require_once 'conexao.class.php';

class Reservas extends Conexao{
    private $hospede;
    private $checkin;
    private $checkout;
    private $apto;
    private $funcionario;
    private $dataCadastro;

    
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

    public function addReserva($dados){
        $this->hospede = $this->filtraEntrada($dados['hospede']);
        $this->checkin = $this->filtraEntrada($dados['checkin']);
        $this->checkout = $this->filtraEntrada($dados['checkout']);
        $this->apto = $this->filtraEntrada($dados['apto']);
        $this->funcionario = $dados["id_funcionario"];
        $this->dataCadastro = $this->dataAtual();

        try{
            $sql = "INSERT INTO reservas (id_hospede, data_entrada, data_saida, id_apartamento, id_funcionario, dataCadastro) VALUES (:id_hospede, :data_entrada, :data_saida, :id_apartamento, :id_funcionario, :dataCadastro)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id_hospede", $this->hospede);
            $sql->bindValue(":data_entrada", $this->checkin);
            $sql->bindValue(":data_saida", $this->checkout);
            $sql->bindValue(":id_apartamento", $this->apto);
            $sql->bindValue(":id_funcionario", $this->funcionario);
            $sql->bindValue(":dataCadastro", $this->dataCadastro);
            $sql->execute();
            
            if($sql->rowCount() > 0){
                $retorno['deucerto'] = true;
                $retorno['mensagem'] = "Reserva cadastrada com sucesso!";
                $retorno['idReserv'] = $this->pdo->lastInsertId();
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
    
    
    
    
    
    
    
    
} /* FIM CLASSE Reservas*/
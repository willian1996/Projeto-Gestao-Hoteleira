<?php
/*
* CLASSE PARA HOSPEDES
* ESTA CLASSE CRIA, LÊ, ATUALIZA E DELETA HOSPEDES
* @package GESTÃO HOTELEIRA
* @author WILLIAN <williansalesgabriel@hotmail.com>
*/
class Hospede{
    private $pdo;
    /*
    * MÉTODO CONSTRUTOR PARA CONECTAR COM O BANCO DE DADOS
    *@param RECEBE A VARIAVEL $PDO VINDO DO ARQUIVO CONEXAO.PHP
    * @author WILLIAN <williansalesgabriel@hotmail.com>
    */
    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    
    /*
    * MÉTODO PARA CADASTRAR HOSPEDES NO BANCO DE DADOS 
    * @param DADOS DO HOSPEDE A SER CADASTRADO 
    * @return ARRAY BOOLEAN E MENSAGEM DE STATUS
    * @author WILLIAN <williansalesgabriel@hotmail.com>
    */
    public function cadastrarHospede($nome_completo, $CPF, $email, $celular, $telefone){
        //aplicando segurança nas entradas 
        $nome_completo = $this->filtraEntrada($nome_completo);
        $CPF = $this->filtraEntrada($CPF);
        $email = $this->filtraEntrada($email);
        $celular = $this->filtraEntrada($celular);
        $telefone = $this->filtraEntrada($telefone);
        
        //verificando se alguns dos campos estão vazios 
        if($nome_completo == '' or $CPF == '' or $email == '' or $celular == '' or $telefone == ''){
            $retorno['deucerto'] = false;
            $retorno['mensagem'] = "Erro! os campos não podem estar vazio!";
            return $retorno;
        }
        //verificando se o email já esta cadastrado 
        if($this->existeEmail($email)){
            $retorno['deucerto'] = false;
            $retorno['mensagem'] = "Erro! E-mail já esta em uso em outro registro!";
            return $retorno;
        }
        //verificando se o cpf ja esta cadastrado 
        if($this->existeCPF($CPF)){
            $retorno['deucerto'] = false;
            $retorno['mensagem'] = "Erro! CPF já está em uso em outro registro!";
            return $retorno;
        }
        try{
            $sql = "INSERT INTO hospedes (nome_completo, CPF, email, celular, telefone) VALUES (:nome_completo, :CPF, :email, :celular, :telefone)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome_completo", $nome_completo);
            $sql->bindValue(":CPF", $CPF);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":celular", $celular);
            $sql->bindValue(":telefone", $telefone);
            $sql->execute();

            if($sql->rowCount() > 0){
                $retorno['deucerto'] = true;
                $retorno['mensagem'] = "hóspede cadastrado com sucesso!";
                $retorno['idHosped'] = $this->infoHospedePorEmail($email)['id'];
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
    
    /*
    * MÉTODO PARA LISTAR HOSPEDES CADASTRADOS COM STATUS 1(ATIVO)
    * @return ARRAY COM TODOS OS REGISTROS 
    * @author WILLIAN <williansalesgabriel@hotmail.com>
    */
    public function listarHospedes(){
        $sql = "SELECT * FROM hospedes WHERE status = 1";
        $sql = $this->pdo->query($sql);
        
        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }else{
            return array();
        }
    }
    
    /*
    * MÉTODO PARA BUSCAR INFORMAÇÕES DE UM HOSPEDE 
    * @param ID IDENTIFICADOR DO HOSPEDE 
    * @return ARRAY COM UM REGISTRO 
    * @author WILLIAN <williansalesgabriel@hotmail.com>
    */
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
    
    /*
    * MÉTODO PARA BUSCAR INFORMAÇÕES DE UM HÓSPEDE 
    * @param EMAIL IDENTIFICADOR DO HOSPEDE 
    * @return ARRAY COM UM REGISTRO 
    * @author WILLIAN <williansalesgabriel@hotmail.com>
    */
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
    
    /*
    * MÉTODO PARA UTUALIZAR INFORMAÇÕES DE UM HÓSPEDE  
    * @param DADOS DO HÓSPEDE A SER ATUALIZADOS  
    * @return ARRAY COM UM REGISTRO 
    * @author WILLIAN <williansalesgabriel@hotmail.com>
    */
    public function editarHospede($id, $nome_completo, $CPF, $email, $celular, $telefone){
        //aplicando segurança nas entradas
        $id = $this->filtraEntrada($id);
        $nome_completo = $this->filtraEntrada($nome_completo);
        $CPF = $this->filtraEntrada($CPF);
        $email = $this->filtraEntrada($email);
        $celular = $this->filtraEntrada($celular);
        $telefone = $this->filtraEntrada($telefone);
        
        
        //verificando se alguns dos campos estão vazios 
        if($nome_completo == '' or $CPF == '' or $email == '' or $celular == '' or $telefone == ''){
            $retorno['deucerto'] = false;
            $retorno['mensagem'] = "Erro! os campos não podem estar vazio!";
            return $retorno;
        }
        //verificando se o email já esta cadastrado 
        if($this->existeEmail($email, $id)){
            $retorno['deucerto'] = false;
            $retorno['mensagem'] = "Erro! E-mail já está em uso em outro registro!";
            return $retorno;
        }
        //verificando se o cpf ja esta cadastrado 
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
                $retorno['mensagem'] = "hóspede editado com sucesso!";
                return $retorno;
            }else{
                $retorno['deucerto'] = false;
                $retorno['mensagem'] = "Não Alterado";
                return $retorno;
            }
        }catch(PDOException $e){
            $retorno['deucerto'] = false;
            $retorno['mensagem'] = "Erro no servidor";
            return $retorno;
        }  
    }
    
    /*
    * MÉTODO PARA DESATIVAR O HOSPEDE   
    * @param ID IDENTIFICADOR DO HOSPEDE 
    * @return ARRAY COM BOOLEAN E MENSAGEM 
    * @author WILLIAN <williansalesgabriel@hotmail.com>
    */
    public function excluirHospede($id){
        $id = $this->filtraEntrada($id);
        $sql = "UPDATE hospedes SET status = '0' WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $retorno['deucerto'] = true;
            $retorno['mensagem'] = "Hóspede excluído!";
            return $retorno;
        }else{
            $retorno['deucerto'] = false;
            $retorno['mensagem'] = "Erro no servidor!";
            return $retorno;
        }
    }
    
    /*
    * MÉTODO PARA VERIFICAR EXISTENCIA DE EMAIL DO HOSPEDE   
    * @param EMAIL E ID IDENTIFICADOR DO HOSPEDE 
    * @return BOOLEAN  
    * @author WILLIAN <williansalesgabriel@hotmail.com>
    */
    public function existeEmail($email, $id=''){
        if($id == ''){
            $email = $this->filtraEntrada($email);
            $sql = "SELECT * FROM hospedes WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":email", $email);
        }else{
            $email = $this->filtraEntrada($email);
            $id = $this->filtraEntrada($id);
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
    
    /*
    * MÉTODO PARA VERIFICAR EXISTENCIA DE CPF DO HOSPEDE   
    * @param CPF E ID IDENTIFICADOR DO HOSPEDE 
    * @return BOOLEAN  
    * @author WILLIAN <williansalesgabriel@hotmail.com>
    */
    public function existeCPF($CPF, $id=''){
        if($id == ''){
            $CPF = $this->filtraEntrada($CPF);
            $sql = "SELECT * FROM hospedes WHERE CPF = :CPF";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":CPF", $CPF);
        }else{
            $CPF = $this->filtraEntrada($CPF);
            $id = $this->filtraEntrada($id);
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
    
    /*
    * MÉTODO PARA PROTEJER O BANCO DE DADOS DE SQL INJECTION   
    * @param DADO A FILTRAR  
    * @return DADO FILTRADO 
    * @author WILLIAN <williansalesgabriel@hotmail.com>
    */
    private function filtraEntrada($campo){
        // remove espaços no início e no final
        $campo = trim($campo); 
        // remove tags html
        $campo = strip_tags($campo); 
        // adiciona caractere de escape nas aspas e apostófros
        $campo = addslashes($campo); 
        return $campo;
    }

}/*FIM DA CLASSE HOSPEDE*/
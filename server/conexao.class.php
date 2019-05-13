<?php
abstract class Conexao{
    private $dbname;
    private $host;
    private $dbuser;
    private $dbpass;
    protected $pdo;
    private $status;
    
    
    public function __construct(){
        $this->dbname = 'gestao-hoteleira';
        $this->host = 'localhost';
        $this->dbuser = 'root';
        $this->dbpass = '';

        try{
            $this->pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->dbuser, $this->dbpass);
            $this->setStatus("Conectado!");
        }catch(PDOException $e){
            $this->setStatus("Não conectado!");
        }
        
    }
    /*
    * MÉTODO PARA PARA RETORNAR O STATUS DA CONEXAO COM BANCO DE DADOS 
    * @return RETORNA O STATUS DA CONEXAO 
    * @author WILLIAN <williansalesgabriel@hotmail.com>
    */
    public function getStatus(){
        return $this->status;
    }
    /*
    * MÉTODO PARA PARA SETAR O STATUS DA CONEXAO COM BANCO DE DADOS 
    * @param RECEBE O STATUS 
    * @author WILLIAN <williansalesgabriel@hotmail.com>
    */
    public function setStatus($s){
        $this->status = $s;
    }
    /*
    * MÉTODO PARA PEGAR A DATA E HORA ATUAL
    * @return DATA E HORA ATUAL EM FORMATO PARA BANCO DE DADOS
    * @author WILLIAN <williansalesgabriel@hotmail.com>
    */
    protected function dataAtual(){
        date_default_timezone_set('America/Sao_Paulo');
        return date("Y-m-d H:i:s");
    }
    
    /*
    * MÉTODO PARA PROTEJER O BANCO DE DADOS DE SQL INJECTION   
    * @param DADO A FILTRAR  
    * @return DADO FILTRADO 
    * @author WILLIAN <williansalesgabriel@hotmail.com>
    */
    protected function filtraEntrada($campo){
        // remove espaços no início e no final
        $campo = trim($campo); 
        // remove tags html
        $campo = strip_tags($campo); 
        // adiciona caractere de escape nas aspas e apostófros
        $campo = addslashes($campo); 
        return $campo;
    }
    
    
}/*FIM CLASSE Conexao*/






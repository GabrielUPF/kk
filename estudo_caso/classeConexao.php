<?php

define('USUARIO', 'root');
define('SENHA',   'root');
define('BD_NOME', 'ads_132');

Class Conexao{
    private $con;

    //método construtor da classe
    function __construct(){
        
        $this->conectar();
    }

    //método privado, acesso somente na classe
    private function conectar(){
        try{
            $this->con = new PDO("mysql:host=localhost;dbname=".BD_NOME,
            USUARIO, SENHA);
        }catch(PDOException $e){
            echo 'Falha na COnexão: ' . $e->getMessage();
        }
    }

    //metodo para executar queries simples
    public function executaQuery($sql, $dados){
        $query = $this->con->prepare($sql); //prepare do SQL
        //$dados é um array que contém os dados dos parâmetros da query SQL
        return $query->execute($dados);
    }

    public function getLista($consulta){
        $query = $this->con->query($consulta);
        $lista = $query->fetchAll();
        // print_r($lista);
        return $lista; //retornando a lista de dados
    }


    public function getRegistro($consulta, $chave){
        $query  = $this->con->prepare($consulta);
        $result = $query->execute($chave);
        if($result==false){ //caso haja erro de sql
            //print_r($this->con->errorInfo()); //mostrabdo erro do PDO
            $mensagem_erro = "Erro ao tentar processar a...";
            require_once('error_page.php'); //enviando o erro para uma página de erro
            die();
        }
        $registro = $query->fetch();
        return $registro;
    }

}

?>

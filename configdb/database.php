<?php

    class DataBase{
        //variaveis privadas
        private $host="localhost";
        private $user_name = "root";
        private $pass = "";
        private $port = 3306;
        private $db_name="five_random_games"; 
        //variaveis publicas
        public $conn;

        public function getConnection(){
            $this->conn = null;
            $ligacao = "mysql:host=".$this->host.";dbname=".$this->db_name.";port=".$this->port;
            try{
                $this->conn=new PDO($ligacao, $this->user_name, $this->pass);
                $this->conn->exec("set names utf8");
            }catch(PDOException $erro){
                echo "Erro na ligação: ".$erro->getMessage();
            }
            return $this->conn;
        }

    }

?>
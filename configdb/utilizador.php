<?php
    class Utilizadores{
        //variaveis privadas
        private $conn;
        private $tb_name = "utilizadores";
        //variaveis publicas
        public $email;
        public $senha;
        public $nome;

        //construtor
        public function __construct($db){
            $this->conn = $db;
        }
        
        
        public function InserirUtilizador(){
            $qry="INSERT INTO ".$this->tb_name." SET email = ?, senha = ?, nome = ?";
            $st=$this->conn->prepare($qry);

            $st->bindParam(1, $this->email);
            $st->bindParam(2, $this->senha);
            $st->bindParam(3, $this->nome);

            if($st->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function thisUserExists($name, $email)
        {
            $qry="SELECT COUNT(*) as total_rows FROM ".$this->tb_name." WHERE email = ? OR nome = ?";
            $st=$this->conn->prepare($qry);
            $st->bindParam(1, $email);
            $st->bindParam(2, $name);
            $st->execute();
            $row=$st->fetch(PDO::FETCH_ASSOC);
            $total_rows=$row["total_rows"]; 
            if($total_rows == 0) return 1;
            else return -1;
        }

        public function login($email, $pass){
            $qry="SELECT * FROM ".$this->tb_name." WHERE email = ? AND senha = ?";
            $st=$this->conn->prepare($qry);
            $st->bindParam(1, $email);
            $st->bindParam(2, $pass);

            if($st->execute()){
                return $st;
            }else{
                return -1;
            }
        }
    }
?>
<?php 

    class Comentarios{
        //variaveis privadas
        private $conn;
        private $tb_name = "comentarios";
        //variaveis publicas
        public $nome_utilizador;
        public $comentario;
        public $nome_jogo;

        //construtor
        public function __construct($db){
            $this->conn = $db;
        }
        
        
        public function InserirComentario(){
            $qry="INSERT INTO ".$this->tb_name." SET nome_utilizador = ?, comentario = ?, nome_jogo = ?";
            $st=$this->conn->prepare($qry);

            $st->bindParam(1, $this->nome_utilizador);
            $st->bindParam(2, $this->comentario);
            $st->bindParam(3, $this->nome_jogo);

            if($st->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function Comentarios($nomeGame){
            $qry="SELECT * FROM ".$this->tb_name." WHERE nome_jogo = ?";
            $st=$this->conn->prepare($qry);
            $st->bindParam(1, $nomeGame);

            if($st->execute()){
                return $st;
            }else{
                return -1;
            }
        }

        public function DeleteComent($comentario, $utilizador, $nameGame){
            $qry = "DELETE FROM ".$this->tb_name." WHERE comentario = ? AND nome_utilizador = ? AND nome_jogo = ?";
            $st=$this->conn->prepare($qry);
            $st->bindParam(1, $comentario);
            $st->bindParam(2, $utilizador);
            $st->bindParam(3, $nameGame);

            $st->execute();
        }
    }

?>
<?php
    include_once "../configdb/database.php";
    include_once "../configdb/utilizador.php";

    if(isset($_POST['emailuser'])){//como é obrigatorio ter todos os paremetros basta verificar o emial
        
        $database = new DataBase();
        $conn = $database->getConnection();
        $users = new Utilizadores($conn);

        $users->email = $_POST['emailuser'];
        $users->nome = $_POST['nameuser'];
        $users->senha = $_POST['password'];
        
        if($users->thisUserExists($users->nome, $users->email) == 1){
            if($users->InserirUtilizador()){
                header("LOCATION: registered.php");
            }else{
                echo "<script>alert('Algo correu mal!!');</script>";
                echo "<script>window.location='login.html';</script>";
            }
        }else{
            echo "<script>alert('Email ou nome de utilizador já existente, por favor altere os dados!!');</script>";
            echo "<script>window.location='registo.html';</script>";
        }
    }
?>
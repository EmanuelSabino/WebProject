<?php
    include_once "../configdb/database.php";
    include_once "../configdb/utilizador.php";

    if(isset($_POST['emailuser'])){//como é obrigatorio ter todos os paremetros basta verificar o emial
        
        $database = new DataBase();
        $conn = $database->getConnection();
        $users = new Utilizadores($conn);

        $users->email = $_POST['emailuser'];
        $users->senha = $_POST['password'];
        $continuar = 0;

        foreach($users->login($users->email, $users->senha) as $Result){
            $continuar = 1;
            session_start();
            $_SESSION['email'] = $Result['email'];
            $_SESSION['nome'] = $Result['nome'];
            header("LOCATION: ../fiverandomgames/homepage/index.html");
        }
        
        if($continuar == 0){
            echo "<script>alert('Login inválido');</script>";
            echo "<script>window.location='login.html';</script>";
        }
    }
?>
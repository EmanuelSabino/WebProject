<?php
    include "../../configdb/comentarios.php";
    include "../../configdb/database.php";
    session_start();

    $database = new DataBase();
    $comentario = new Comentarios($database->getConnection());

    $nomeUtilizador = $_SESSION['nome'];
    $coment = $_GET['coment'];
    $nameGame = $_GET["nameGame"];

    $comentario->DeleteComent($coment, $nomeUtilizador, $nameGame);
    header("LOCATION: detalhegame.php?numGame=".$_GET['numGame']."&nameGame=".$nameGame);
?>
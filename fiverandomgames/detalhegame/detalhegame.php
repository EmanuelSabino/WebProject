<?php
    include "../../configdb/database.php";
    include "../../configdb/comentarios.php";
    include "../../configdb/utilizador.php";
    session_start(); 
    $database = new DataBase();
    $comentario = new Comentarios($database->getConnection());

    if(isset($_POST['comentario'])){
      
      if(!empty($_POST['comentario'])){
        $comentario->comentario = trim($_POST['comentario']);
        $comentario->nome_utilizador = $_SESSION['nome'];
        $comentario->nome_jogo = $_GET['nameGame'];
        
        $continuar = true;

        foreach($comentario->Comentarios($_GET['nameGame']) as $todosCom){
          if($todosCom['nome_utilizador'] == $_SESSION['nome'] && trim($todosCom['comentario']) == trim($_POST['comentario'])){
              $continuar = false;
          }
        }
        if($continuar){
          $comentario->InserirComentario();
        }else{
          echo "<script>alert('Não pode repetir o comentario');</script>";
          echo "<script>window.location='detalhegame.php?numGame=".$_GET['numGame']."&nameGame=".$_GET['nameGame']."';</script>";
        }
      }
    }

?>

<!DOCTYPE html>
<html lang="en" ng-app="CatalgosJogos"> 
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link href="../css/detalhe.css" rel="stylesheet">

    <link href='http://use.fontawesome.com/releases/v5.7.1/css/all.css' type='text/css' rel='stylesheet'>
    <script src='https://code.iconify.design/1/1.0.6/iconify.min.js'></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
</head>
<body ng-controller="CatalgosJogosCtrl">
    <title>{{todosJogos[<?php echo "".$_GET['numGame'];?>]['Name']}}</title>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    &nbsp;&nbsp; <a class="navbar-brand" style="cursor: default; color: dodgerblue;">Random Five Games</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="../homepage/index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../searchgames/searchgames.html">Search Games</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../login/login.html">Sair</a>
            </li>
          </ul>
        </div>
      </nav>

      <section id="services" class="services">
      <div class="container">
        <div class="section-title">

          <h2 style="cursor: default; font-size: 50px;">{{todosJogos[<?php echo $_GET['numGame'];?>]['Name']}}</h2> 
          <img class="pegi" src="{{todosJogos[<?php echo $_GET['numGame'];?>]['Pegi']}}" />
        </div>

        <div class="row">
            <div class="icon-box">
              <img id="imgagine" class="imgagine" src="{{todosJogos[<?php echo $_GET['numGame'];?>]['Image']}}" />
              <p class="description" id="description">{{todosJogos[<?php echo $_GET['numGame'];?>]['Description']}}</p>
              <br />

              <h2 id="price" style="color: red;">{{todosJogos[<?php echo $_GET['numGame'];?>]['Price']}}</h2>
              <spam id="paragrafoPrice" style="color: #7425cf;"><u>Este não é um preço fixo, pode variar e muito</u></spam>
              <br/>
              <p><h2><b><u>Lançamento</u></b></h2> <h4>{{todosJogos[<?php echo $_GET['numGame'];?>]['Lancamento']}}</p><h4>
              <p></p><p></p>
              <p><h2><b><u>Compatibilidade</u></b></h2> <h4>{{todosJogos[<?php echo $_GET['numGame'];?>]['Platform']}}</p><h4>
              
              <br />

              <h1 style="color: black;">Comentarios</h1>
              <br/>

              <form method="POST" action="detalhegame.php?numGame=<?php echo "".$_GET['numGame'];?>&nameGame=<?php echo "".$_GET['nameGame'];?>">
                <textarea name="comentario" id="comentario" style="max-height: 100px; min-height: 100px; width: 300px;" cols="20" rows="5" wrap="hard" maxlength="150" placeholder="COMENTA AQUI!!" required></textarea>
                <br/>
                <button>Comentar</button>
              </form>

              <br />
              <br />

              <?php foreach($comentario->Comentarios($_GET['nameGame']) as $allComent): ?>
              
                <?php if($allComent['nome_utilizador'] != $_SESSION['nome']):?>
              
                  <div class="container">
                    <div class="card">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-10">
                                  <h2 style="text-align: start;color: black;"><?php echo $allComent['nome_utilizador'];?></h2>
                                 <h4 style="text-align: start; color: black;"><?php echo $allComent['comentario'];?></h4>  
                              </div>
                          </div>
                        </div>
                      </div>  
                    </div>

                <?php endif;?>

                <?php if($allComent['nome_utilizador'] == $_SESSION['nome']): ?>
        
                  <div class="container">
                    <div class="card">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-10">
                                <h2 style="text-align: end;color: black;"><?php echo $allComent['nome_utilizador'];?> &nbsp;<a 
                                  style="color:red;" class='fas fa-trash-alt' href="deletecoment.php?coment=<?php echo $allComent['comentario'];?>&numGame=<?php echo $_GET['numGame']?>&nameGame=<?php echo $_GET['nameGame'];?>"></a></h2>
                                <h4 style="text-align: end; color: black;"><?php echo $allComent['comentario'];?></h4>
                              </div>
                          </div>
                        </div>
                      </div>  
                    </div>
                
                  <?php endif;?>
                <br/>
              <?php endforeach;?>
            </div>
      </div>    
    </section>  

    <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
    <script type="text/javascript" src="../angular/angular.js"></script>
    <script src="jquery.js"></script>
</body>
</html>
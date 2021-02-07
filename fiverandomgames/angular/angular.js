var app = angular.module("CatalgosJogos", []);
app.controller("CatalgosJogosCtrl", ['$scope', '$http',function($scope, $http){
    //estas 6 variaveis vão ser as posiçoes do json dos dados que vai apresentar depois aleatoriamente
    $scope.PrimeiroJogo = null;
    $scope.SegundoJogo = null;
    $scope.TerceiroJogo = null;
    $scope.QuartoJogo = null;
    $scope.QuintoJogo = null;
    $scope.SextoJogo = null;

    $scope.numeroJogo = null;
    $scope.searchGames = null;

    $http.get("../../jogos.json").then(function($data){
        $scope.todosJogos = $data.data;
        $scope.tamanhoJson = $scope.todosJogos.length-1;
        
        if($scope.tamanhoJson > 5){
            $scope.PrimeiroJogo = NumeroAleatorio($scope.tamanhoJson, null, null, null, null, null, 0);
            $scope.SegundoJogo = NumeroAleatorio($scope.tamanhoJson, $scope.PrimeiroJogo, null, null, null, null, 2);
            $scope.TerceiroJogo = NumeroAleatorio($scope.tamanhoJson, $scope.PrimeiroJogo, $scope.SegundoJogo, null, null, null, 3);
            $scope.QuartoJogo = NumeroAleatorio($scope.tamanhoJson, $scope.PrimeiroJogo, $scope.SegundoJogo, $scope.TerceiroJogo, null, null, 4);
            $scope.QuintoJogo = NumeroAleatorio($scope.tamanhoJson, $scope.PrimeiroJogo, $scope.SegundoJogo, $scope.TerceiroJogo, $scope.QuartoJogo, null, 5);
            $scope.SextoJogo = NumeroAleatorio($scope.tamanhoJson, $scope.PrimeiroJogo, $scope.SegundoJogo, $scope.TerceiroJogo, $scope.QuartoJogo, $scope.QuintoJogo, 6);
        }
     });

     $scope.RefreshGames = function(){
            $scope.PrimeiroJogo = NumeroAleatorio($scope.tamanhoJson, null, null, null, null, null, 0);
            $scope.SegundoJogo = NumeroAleatorio($scope.tamanhoJson, $scope.PrimeiroJogo, null, null, null, null, 2);
            $scope.TerceiroJogo = NumeroAleatorio($scope.tamanhoJson, $scope.PrimeiroJogo, $scope.SegundoJogo, null, null, null, 3);
            $scope.QuartoJogo = NumeroAleatorio($scope.tamanhoJson, $scope.PrimeiroJogo, $scope.SegundoJogo, $scope.TerceiroJogo, null, null, 4);
            $scope.QuintoJogo = NumeroAleatorio($scope.tamanhoJson, $scope.PrimeiroJogo, $scope.SegundoJogo, $scope.TerceiroJogo, $scope.QuartoJogo, null, 5);
            $scope.SextoJogo = NumeroAleatorio($scope.tamanhoJson, $scope.PrimeiroJogo, $scope.SegundoJogo, $scope.TerceiroJogo, $scope.QuartoJogo, $scope.QuintoJogo, 6);
     };


     $scope.pesquisa = function($pesq){
        $scope.searchGames = Array(); 
        $pesq = $pesq.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g,'');

         for (i = 0; i<$scope.todosJogos.length; i++){
            $nomeGame = $scope.todosJogos[i]['Name'].substring(0, $pesq.length);
            
            if($nomeGame.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g,'') === $pesq){
                $scope.searchGames.push($scope.todosJogos[i]);
            }
         }
         if($pesq === "") {
             $scope.searchGames = null;
         }
         return $scope.searchGames;
     }

     $scope.numGame= function($name){
        for (i = 0; i < $scope.todosJogos.length; i++){
            if($name === $scope.todosJogos[i]['Name']){
                $scope.numeroJogo = i;
            }
        }
     }

}]);


function NumeroAleatorio($tamanhoMax, $num1, $num2, $num3, $num4, $num5, $posicao){
    if($posicao == 2){
        do{
            var num = Math.floor(Math.random() * ($tamanhoMax - 0 + 1)) + 0;
        } while (num == $num1);
        return num;
    } else if($posicao == 3){
        do{
            var num = Math.floor(Math.random() * ($tamanhoMax - 0 + 1)) + 0;
        } while (num == $num1 || num == $num2);
        return num;
    } else if($posicao == 4){
        do{
            var num = Math.floor(Math.random() * ($tamanhoMax - 0 + 1)) + 0;
        } while (num == $num1 || num == $num2 || num == $num3);
        return num;
    } else if($posicao == 5){
        do{
            var num = Math.floor(Math.random() * ($tamanhoMax - 0 + 1)) + 0;
        } while (num == $num1 || num == $num2 || num == $num3 || num == $num4);
        return num;
    } else if($posicao == 6){
        do{
            var num = Math.floor(Math.random() * ($tamanhoMax - 0 + 1)) + 0;
        } while (num == $num1 || num == $num2 || num == $num3 || num == $num4 || num == $num5);
        return num;
    } else{
        return Math.floor(Math.random() * ($tamanhoMax - 0 + 1)) + 0;
    }
}
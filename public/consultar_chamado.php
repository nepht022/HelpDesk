<?php
  require_once('valida_acesso.php');
?>

<?php
  $seq = 0;
  $aparecer = false;

  $registro = Array();
  $registro_dados = [];

  //abre o arquivo txt para leitura
  $arquivo = fopen('../arquivo.txt', 'r');

  //testa ate o fim do arquivo
  while(!feof($arquivo)){
    //cada posição no array recebe uma linha do arquivo
    $registro[] = fgets($arquivo);
  }
  fclose($arquivo);
?>

<?php
  //separa cada posicao do array em arrays pros valores dividos pelo ||
  //ex: [0] 1 || a || b || c -> [0] 1, [1] a, [2] b, [3] c
  foreach($registro as $chamado){
    $chamado_dados = explode('||', $chamado);
    //se a quantidade de posições for >=3 ou seja, nenhum campo ficou vazio
    if(count($chamado_dados)>=3){
      //se o usuario da sessao for um administrador, atribui todos os chamados a um array
      //se o usuario da sessao for um usuario, atribui todos seus proprios chamados a um array
      //nos dois casos os dados podem aparecer
      if($_SESSION['perfil_id']==1 or $_SESSION['id'] == $chamado_dados[0]){
        $aparecer = true;
        $registro_dados[$seq] = $chamado_dados;
        $seq++;
      }
    }
  }
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="logoff.php" class="nav-link">Sair</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <?php
                //se os dados podem aparecer, para cada posição do array, exibe seus valores exceto o id
                if($aparecer){  
                  for($seq_dados=0;$seq_dados<$seq;$seq_dados++){
              ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?=$registro_dados[$seq_dados][1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?=$registro_dados[$seq_dados][2]?></h6>
                  <p class="card-text"><?=$registro_dados[$seq_dados][3]?></p>
                </div>
              </div>
              <?php
                  }
                }
              ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block" type="submit">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
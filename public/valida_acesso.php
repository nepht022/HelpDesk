<?php
  session_start();
  
  //verificação de autenticação do usuario da sessao que deve ser feita no inicio de todas páginas que requerem login
  if(!isset($_SESSION['autenticado']) or $_SESSION['autenticado']!='SIM'){
    header('Location: index.php?login=erro2');
  }
?>
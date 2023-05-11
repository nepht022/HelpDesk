<?php
    session_start();

    //abri um arquivo para registro de dados
    $arquivo = fopen('../arquivo.txt', 'a');

    //atribui à uma variavel como string o id do usuario da sessao mais os dados do chamado digitados no form, separados por ||
    //escreve no arquivo txt e pula uma linha
    $texto = $_SESSION['id'].' || '.implode(' || ', $_POST).PHP_EOL;
    fwrite($arquivo, $texto);

    fclose($arquivo);

    header('Location: abrir_chamado.php');
?>
<?php
    //remover o indice do array da sessao = unset()
    //destruir a sessao = session_destroy()

    //inicia sessao, remove os dados do usuario da sessao e destroi a sessao
    session_start();
    unset($_SESSION['Num']);//remove apenas se existir

    session_destroy();
    header('Location: index.php');
    
?>
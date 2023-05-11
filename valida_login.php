<?php
    //inicia sessao
    session_start();

    //variaveis para receber a inforcação do usuario da sessao
    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    //simulando dados registrados em um BD
    $perfis = [1 => 'Administrativo', 2 => 'Usuario'];
    $usuarios = [
        ['id' => 1, 'email' => 'adm@teste.com.br', 'senha' => 'admin', 'perfil_id' => 1], 
        ['id' => 2, 'email' => 'jose@teste.com.br', 'senha' => '12345', 'perfil_id' => 2],
        ['id' => 3, 'email' => 'maria@teste.com.br', 'senha' => '12345', 'perfil_id' => 2],
        ['id' => 4, 'email' => 'rodrigofreire2102000@gmail.com', 'senha' => '12345', 'perfil_id' => 1]
    ];

    //para cada usuario no "BD" compara com o usuario vindo do form
    //se for igual, atribui seus dados às varaiveis locais e o torna autenticado
    foreach($usuarios as $user){
        if($user['email']==$_POST['email'] and $user['senha']==$_POST['senha']){
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
    }

    //se o usuario foi autenticado, atribui os valores das variaveis locais às "variaveis" da sessao
    if($usuario_autenticado){
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] =  $usuario_perfil_id;
        header('Location: home.php');
    }else{
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
    }
?>
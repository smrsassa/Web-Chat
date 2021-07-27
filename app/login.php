<?php

include dirname(__DIR__) . '\vendor\autoload.php';


use phpWebChat;

try {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $usuario = new phpWebChat\Usuario();

    if ( $usuario->login($nome, $senha) )
    {
        header("location: ../public/");
    } else
    {
        header("location: ../public/login/");
    }

} catch (Exception $e) {
    echo $e;
}

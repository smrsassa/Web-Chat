<?php

require_once __DIR__ . '/core/usuario.php';


try {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $usuario = new usuario();

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

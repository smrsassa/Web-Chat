<?php

require_once __DIR__ . '/class/usuario.php';

try {

    $nome = $_GET['nome'];
    $senha = $_GET['senha'];

    $usuario = new usuario();

    $usuario->login($nome, $senha);

} catch (Exception $e) {
    echo $e;
}

<?php

require_once __DIR__ . '/core/usuario.php';


try {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nomeUnico = $_POST['nomeUnico'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $imgData = file_get_contents($_FILES["image"]["tmp_name"]);
    $imgType = $_FILES["image"]["type"];

    if ( (substr($imgType,0,5) == "image") == 1 ) {
    
        $usuario = new usuario();

        if ( $usuario->registro($nome, $sobrenome, $nomeUnico, $email, $senha, $imgData) )
        {
            header("location: ../public/login/");
        } else
        {
            header("location: ../public/registro/");
        }
    }

} catch (Exception $e) {
    echo $e;
}

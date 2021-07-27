<?php

include dirname(__DIR__) . '\vendor\autoload.php';


use phpWebChat\Validacao;

try {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nomeUnico = $_POST['nomeUnico'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $imgData = file_get_contents($_FILES["image"]["tmp_name"]);
    $imgType = $_FILES["image"]["type"];

    if ( (substr($imgType,0,5) == "image") == 1 ) {
        
        $userClass = new phpWebChat\Usuario();

        if ( Validacao::email($email) ) {
            if ( $userClass->registro($nome, $sobrenome, $nomeUnico, $email, $senha, $imgData) )
            {
                header("location: ../public/login/");
            } else
            {
                header("location: ../public/registro/");
            }
        } else {
            header("location: ../public/registro/");
        }
    } else {
        header("location: ../public/registro/");
    }

} catch (Exception $e) {
    header("location: ../public/registro/");
}

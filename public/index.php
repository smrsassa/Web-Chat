<?php

include dirname(__DIR__) . '\vendor\autoload.php';

use phpWebChat\Route;

$loader = new \Twig\Loader\FilesystemLoader( dirname(__DIR__) . '/app/views/' );
$twig = new \Twig\Environment($loader);

session_start();

function logado() {
    if ( !isset($_SESSION['id']) ) {
        header("location: http://localhost/phpwebchat/public/login/");
    }
}

Route::add('/phpwebchat/public/login/', function() {
    global $twig;

    echo $twig->render('formPage.html', [
        "formulario" => "partials/formLogin.html"
    ]);
});

Route::add('/phpwebchat/public/registro/', function() {
    global $twig;

    echo $twig->render('formPage.html', [
        "formulario" => "partials/formRegistrar.html"
    ]);
});

Route::add('/phpwebchat/public/logout/', function() {
    global $twig;

    include dirname(__DIR__) . '\app\logout.php';

    echo $twig->render('formPage.html', [
        "formulario" => "partials/formLogin.html"
    ]);
});

Route::add('/phpwebchat/public/', function() {
    global $twig;

    logado();

    echo $twig->render('index.html', [
        "userName" => $_SESSION['nomeUnico'],
        "conversas" => [
            [ "id" => 1, "nome" => "Samuel", "ultimaMsg" => "Oi" ],
            [ "id" => 2, "nome" => "Mãe", "ultimaMsg" => "Aqui" ],
            [ "id" => 3, "nome" => "Pai", "ultimaMsg" => "Olá" ],
            [ "id" => 4, "nome" => "Sei lá", "ultimaMsg" => "???" ]
        ]
    ]);
});

Route::addRoute404(function() {
    global $twig;

    echo $twig->render('error/404.html');
});

Route::add('/phpwebchat/public/chat/', function() {
    global $twig;

    echo $twig->render('partials/chat.html', [
        "userName" => "Cara Aleatório",
        "status" => "Meu status",
        "mensagens" => [
            [ "destino" => "outgoing", "mensagem" => "asd" ],
            [ "destino" => "incoming", "mensagem" => "asd" ],
        ]
    ]);
});

call_user_func(
    Route::run()
);

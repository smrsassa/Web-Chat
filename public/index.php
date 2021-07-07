<?php

include dirname(__DIR__) . '\vendor\autoload.php';
include dirname(__DIR__) . '\app\core\route.php';


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
    ]);
});

Route::addRoute404(function() {
    global $twig;

    echo $twig->render('error/404.html');
});

call_user_func(
    Route::run()
);

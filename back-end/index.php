<?php

include __DIR__ . '\vendor\autoload.php';
include __DIR__ . '\class\route.php';


$loader = new \Twig\Loader\FilesystemLoader( dirname(__DIR__).'/front-end/pages/');
$twig = new \Twig\Environment($loader);

Route::add('/web-chat/login/',function() {
    global $twig;

    echo $twig->render('formPage.html', [
        "formulario" => "partials/formLogin.html"
    ]);
});

Route::add('/web-chat/registro/',function() {
    global $twig;

    echo $twig->render('formPage.html', [
        "formulario" => "partials/formRegistrar.html"
    ]);
});

Route::add('/web-chat/',function() {
    global $twig;

    echo $twig->render('index.html', [
        "conteudoConversas" => "partials/conversas.html",
        "conteudoChat" => "partials/chatArea.html"
    ]);
});

Route::addRoute404(function() {
    global $twig;

    echo $twig->render('error/404.html');
});

call_user_func(
    Route::run()
);


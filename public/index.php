<?php

include dirname(__DIR__) . '\vendor\autoload.php';
include dirname(__DIR__) . '\app\core\route.php';


$loader = new \Twig\Loader\FilesystemLoader( dirname(__DIR__) . '/app/views/' );
$twig = new \Twig\Environment($loader);

Route::add('/phpwebchat/public/login/',function() {
    global $twig;

    echo $twig->render('formPage.html', [
        "formulario" => "partials/formLogin.html"
    ]);
});

Route::add('/phpwebchat/public/registro/',function() {
    global $twig;

    echo $twig->render('formPage.html', [
        "formulario" => "partials/formRegistrar.html"
    ]);
});

Route::add('/phpwebchat/public/',function() {
    global $twig;

    echo $twig->render('index.html', [
        "userName" => "Banana",
    ]);
});

Route::addRoute404(function() {
    global $twig;

    echo $twig->render('error/404.html');
});

call_user_func(
    Route::run()
);

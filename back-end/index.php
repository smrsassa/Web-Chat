<?php

include('class/rotas.php');

// Essa rota acontece, pois trabalhando com xampp minhas aplicações ficam em um subdiretório
Route::add('/web-chat/login/',function() {
    return 'formPage.html';
});

Route::add('/web-chat/registro/',function() {
    return 'formPage.html';
});

Route::add('/web-chat/',function() {
    return 'index.html';
});

Route::run();


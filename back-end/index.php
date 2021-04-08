<?php

include('class/rotas.php');

// Essa rota acontece, pois trabalhando com xampp minhas aplicações ficam em um subdiretório
Route::add('/web-chat/login/',function() {
    require_once '../front-end/pages/formPage.html';
});

Route::add('/web-chat/registro/',function() {
    require_once '../front-end/pages/formPage.html';
});

Route::add('/web-chat/',function() {
    require_once '../front-end/pages/index.html';
});

Route::run();


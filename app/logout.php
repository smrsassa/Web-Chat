<?php

include dirname(__DIR__) . '\vendor\autoload.php';


$userClass = new phpWebChat\Usuario();

session_start();

$userClass->updateUserLog($_SESSION['id']);

session_destroy();

header("location: http://localhost/phpwebchat/public/");

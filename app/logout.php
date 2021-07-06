<?php

require_once __DIR__ . '/class/usuario.php';

$userClass = new usuario();

session_start();

$userClass->updateUserLog($_SESSION['id']);

session_destroy();

header("location: ../");

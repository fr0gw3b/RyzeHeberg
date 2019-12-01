<?php

session_start();

//die('Maintenance');

// Chargement automatique de Composer
require __DIR__.'/../vendor/autoload.php';

// Chargement de Dotenv (permettant de lire le fichier ".env")
$dotenv = Dotenv\Dotenv::create(__DIR__.'/../');
$dotenv->load();

require '../config/routes/Routes.php';
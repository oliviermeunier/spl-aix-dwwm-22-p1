<?php 

// Démarrage de la session
session_start();

// Inclusion de l'autoloader de composer
require '../vendor/autoload.php';

// Inclusion de la config
require '../app/config.php';

// Inclusion des dépendances
require '../lib/functions.php';

// Récupération du path
$path = str_replace(BASE_URL, '', $_SERVER['REQUEST_URI']);
$path = str_replace('/index.php', '', $path);
$path = explode('?', $path)[0];

if ($path == '') {
    $path = '/';
}

// Routing
switch($path) {
    case '/':
        require '../controllers/home.php';
        break;
    
    case '/article':
        require '../controllers/article.php';
        break;

    default:
        http_response_code(404);
        echo 'Erreur 404 : Page introuvable';
        exit;
}
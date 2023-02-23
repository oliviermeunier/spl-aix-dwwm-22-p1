<?php 

// Inclusion de l'autoloader de composer
require 'vendor/autoload.php';

// Inclusion de la config
require 'config.php';

// Inclusion des dépendances
require 'functions.php';

// Validation du paramètre id de l'URL
if (!array_key_exists('id', $_GET) || !$_GET['id'] || !ctype_digit($_GET['id'])) {
    http_response_code(404);
    echo 'Article introuvable';
    exit; // Fin de l'exécution du script PHP
}

// Récupération du paramètre id de l'URL
$idArticle = (int) $_GET['id'];

// Récupération de l'article à afficher
$article = getOneArticle($idArticle);

// Vérification de l'existance de l'article
if (!$article) {
    http_response_code(404);
    echo 'Article introuvable (id '.$idArticle.')';
    exit; // Fin de l'exécution du script PHP
}

// Affichage : inclure le template
$template = 'article';
include 'base.phtml';
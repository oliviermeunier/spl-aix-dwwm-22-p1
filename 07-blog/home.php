<?php 

// Inclusion de l'autoloader de composer
require 'vendor/autoload.php';

// Inclusion de la config
require 'config.php';

// Inclusion des dépendances
require 'functions.php';

// Sélection des 3 derniers articles
$articles = getAllArticles();

// dump($articles);

// Affichage : inclusion du template
$template = 'home';
include 'base.phtml';
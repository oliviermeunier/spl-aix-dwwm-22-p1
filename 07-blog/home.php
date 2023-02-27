<?php 

// Inclusion de l'autoloader de composer
require 'vendor/autoload.php';

// Inclusion de la config
require 'config.php';

// Inclusion des dépendances
require 'src/Core/Database.php';
require 'functions.php';

// Sélection des 3 derniers articles
$articles = getAllArticles();

// Affichage : inclusion du template
$template = 'home';
include 'base.phtml';
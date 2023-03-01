<?php 

// Import de classes
use App\Model\ArticleModel;

// Inclusion de l'autoloader de composer
require 'vendor/autoload.php';

// Inclusion de la config
require 'config.php';

// Inclusion des dépendances
require 'functions.php';

// Sélection des 3 derniers articles
$articleModel = new ArticleModel();
$articles = $articleModel->getAllArticles();

// Affichage : inclusion du template
$template = 'home';
include 'base.phtml';
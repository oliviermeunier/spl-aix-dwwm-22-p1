<?php 

// Import de classes
use App\Model\ArticleModel;

// Sélection des 3 derniers articles
$articleModel = new ArticleModel();
$articles = $articleModel->getAllArticles();

// Affichage : inclusion du template
$template = 'home';
include '../templates/base.phtml';
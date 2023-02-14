<?php 

// Démarrage de la session
session_start();

// Inclusion des dépendances
require 'functions.php';

$flashMessage = null;

// Récupération du message flash
if (array_key_exists('flash', $_SESSION) && $_SESSION['flash']) {
    
    // On récupère le message flash dans une variable 
    $flashMessage = $_SESSION['flash'];

    // On l'efface de la session
    $_SESSION['flash'] = null;
}

// Inclusion du template
$template = 'index';
include 'base.phtml';
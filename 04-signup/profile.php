<?php 

// On démarre la session
session_start();

// Inclusion des dépendances
require 'functions.php';

// SECURITE : est-ce que l'utilisateur est bien connecté ?
if (!isConnected()) {
    http_response_code(404);
    echo 'Page introuvable';
    exit;
}

$firstname = $_SESSION['user']['firstname'];
$lastname = $_SESSION['user']['lastname'];

// Inclusion du template
$template = 'profile';
include 'base.phtml';
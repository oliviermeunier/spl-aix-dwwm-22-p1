<?php 

// Démarrage de la session
session_start();

// Inclusion des dépendances
require 'functions.php';

$error = null;

// Si le formulaire est soumis...
if(!empty($_POST)) {

    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // 1. Est-ce que les identifiants sont corrects ?
    $customer = checkCredentials($email, $password);

    if (!$customer) {
        $error = 'Identifiants incorrects';
    }

    // Identifiants corrects
    else {

        // 2. Enregistrer l'utilisateur en session
        $_SESSION['user'] = [
            'firstname' => $customer['firstname'],
            'lastname' => $customer['lastname'],
            'email' => $customer['email']
        ];

        // Message flash de succès
        $_SESSION['flash'] = 'Content de te revoir ' . $customer['firstname'];

        // Redirection vers la page d'accueil
        header('Location: index.php');
        exit;
    }
}

// Inclusion du template
$template = 'login';
include 'base.phtml';
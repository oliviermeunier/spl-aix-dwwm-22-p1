<?php 

// Démarrage de la session
// Att. : démarrer la session AVANT tout envoi de données au client
session_start();

// Inclusion des dépendances
require 'functions.php';

///////////////////////////////////////
//            TRAITEMENTS            //
///////////////////////////////////////

$lastname = '';
$firstname = '';
$birthdate = '';
$email = '';
$newsletter = 0;

// Si le formulaire a été soumis...
if (!empty($_POST)){

    // 1. Récupération des données du formulaire
    $lastname = trim($_POST["lastname"]);
    $firstname = trim($_POST["firstname"]);
    $birthdate = $_POST["birthdate"];
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $passwordConfirm = $_POST["password-confirm"];
    // $newsletter = $_POST["newsletter"] ?? 0;
    $newsletter = isset($_POST["newsletter"]) ? intval($_POST["newsletter"]) : 0;

    // Validation du formulaire
    $errors = validateForm(
        $lastname, 
        $firstname,
        $email,
        $birthdate, 
        $password,
        $passwordConfirm
    );

    // Si il n'y a pas d'erreur... 
    if(empty($errors)) {

        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Ajout du nouvel utilisateur dans le fichier JSON
        addCustomer(
            $lastname, 
            $firstname,
            $email,
            $birthdate, 
            $hash,
            $newsletter
        );

        // Ajout d'un message flash en session
        $_SESSION['flash'] = 'Votre compte a été créé avec succès.';

        // Redirection vers l'index.php mais sans les données du formulaire
        // Design pattern : POST redirect GET (cf https://fr.wikipedia.org/wiki/Post-redirect-get)
        header('Location: index.php');
        exit;
    }
}

///////////////////////////////////////
//             AFFICHAGE             //
///////////////////////////////////////

// Inclusion du template
$template = 'signup';
include 'base.phtml';






















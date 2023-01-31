<?php 


// Inclusion des dépendances
require 'functions.php';

///////////////////////////////////////
//            TRAITEMENTS            //
///////////////////////////////////////

const FILENAME = 'customers.json';

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
    $newsletter = isset($_POST["newsletter"]) ? $_POST["newsletter"] : 0;

    // 2. Validation des données : on initialise un tableau, on stockera les messages d'erreur dedans
    $errors = [];

    // Récupération des données du fichier JSON

    // On initialise la variable $customers à un tableau vide
    $customers = [];

    // Si le fichier existe... 
    if(file_exists(FILENAME)) {

        // ... on récupère son contenu
        $jsonData = file_get_contents(FILENAME);

        // Si il y a bien des données dans le fichier JSON...
        if($jsonData) {

            // ... on les récupère !
            $customers = json_decode($jsonData, true);
        }
    }

    // Si le champ "firstname" n'est pas rempli...
    if(!$firstname) {
        $errors['firstname'] = 'Veuillez remplir le champ "Prénom"';
    }

    if(!$lastname) {
        $errors['lastname'] = 'Veuillez remplir le champ "Nom"';
    }

    if(!$birthdate) {
        $errors['birthdate'] = 'Veuillez remplir le champ "Date de naissance"';
    }

    // Validation de l'email
    if(!$email) {
        $errors['email'] = 'Veuillez remplir le champ "Email"';
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Veuillez remplir un email valide';
    } elseif(emailExists($email, $customers)) {
        $errors['email'] = 'Un compte existe déjà avec cet email';
    }

    if(strlen($password) < 8) {
        $errors['password'] = 'Le mot de passe doit comporter au moins 8 caractères';
    } elseif ($password != $passwordConfirm) {
        $errors['password-confirm'] = 'La confirmation ne correspond pas';
    }

    // Si il n'y a pas d'erreur... 
    if(empty($errors)) {

        // Création d'un tableau associatif pour stocker les données du nouveau client
        $newCustomer = [
            "lastname" => $lastname,
            "firstname" => $firstname,
            "birthdate" => $birthdate,
            "email" => $email,
            "password" => $password,
            "newsletter" => $newsletter
        ];

        // On ajoute le nouveau client au tableau de clients
        array_push($customers, $newCustomer);

        // conversion du tableau en chaîne JSON : PHP => JSON (string)
        $jsonData = json_encode($customers, JSON_PRETTY_PRINT);

        // enregistrement de la chaîne JSON dans le fichier customer.json
        file_put_contents(FILENAME, $jsonData);
    }
}

///////////////////////////////////////
//             AFFICHAGE             //
///////////////////////////////////////
include 'index.phtml';






















<?php 


///////////////////////////////////////
//            TRAITEMENTS            //
///////////////////////////////////////

const FILENAME = 'customers.json';

// Si le formulaire a été soumis...
if (!empty($_POST)){

    // 1. Récupération des données du formulaire
    $nom = trim($_POST["lastname"]);
    $prenom = trim($_POST["firstname"]);
    $date_naissance = $_POST["birthdate"];
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    // $newsletter = $_POST["newsletter"] ?? 0;
    $newsletter = isset($_POST["newsletter"]) ? $_POST["newsletter"] : 0;

    // 2. Validation des données


    // Création d'un tableau associatif pour stocker les données du nouveau client
    $newCustomer = [
        "lastname" => $nom,
        "firstname" => $prenom,
        "birthdate" => $date_naissance,
        "email" => $email,
        "password" => $password,
        "newsletter" => $newsletter
    ];

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

    // On ajoute le nouveau client au tableau de clients
    array_push($customers, $newCustomer);

    // conversion du tableau en chaîne JSON : PHP => JSON (string)
    $jsonData = json_encode($customers, JSON_PRETTY_PRINT);

    // enregistrement de la chaîne JSON dans le fichier customer.json
    file_put_contents(FILENAME, $jsonData);
}

///////////////////////////////////////
//             AFFICHAGE             //
///////////////////////////////////////
include 'index.phtml';






















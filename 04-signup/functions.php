<?php 

const FILENAME = 'customers.json';

/**
 * Vérifie des identifiants de connexion
 */
function checkCredentials(string $email, string $password)
{
    // 1. Est-ce que l'utilisateur (email) existe ?
    $customer = getCustomerByEmail($email);
    
    // Si le client n'existe pas...
    if ($customer == null) {
        return false;
    } 

    // Sinon (si le client existe)

    // 2. Est-ce que le mot de passe est correct ?
    if ($password != $customer['password']) {
        return false;
    }

    // Ici tout est OK ! 
    return $customer;    
}


/**
 * Récupère un client à partir de son email
 */
function getCustomerByEmail(string $email): ?array
{
    // On récupère le tableau de customers
    $customers = getDataFromJSON(FILENAME);

    // On vérifie l'existance de l'email seulement si celui-ci est rempli et valide
    foreach ($customers as $customer) {
        if($customer['email'] == $email) {
            return $customer;
        }
    }

    // Ici je sais que je n'ai pas trouvé le client
    return null;
}

/**
 * Vérifie si l'email existe dans le fichier de customers
 */
function emailExists(string $email, array $customers): bool
{
    // On vérifie l'existance de l'email seulement si celui-ci est rempli et valide
    foreach ($customers as $customer) {
        if($customer['email'] == $email) {
            return true;
        }
    }

    return false;
}

function getDataFromJSON(string $filepath)
{
    // On initialise la variable $customers à un tableau vide
    $datas = [];

    // Si le fichier existe... 
    if(file_exists($filepath)) {

        // ... on récupère son contenu
        $jsonData = file_get_contents($filepath);

        // Si il y a bien des données dans le fichier JSON...
        if($jsonData) {

            // ... on les récupère !
            $datas = json_decode($jsonData, true);
        }
    }

    return $datas;
}


function validateForm(
    string $lastname, 
    string $firstname,
    string $email,
    string $birthdate, 
    string $password,
    string $passwordConfirm
)
{
    // Récupération des données du fichier JSON
    $customers = getDataFromJSON(FILENAME);

    // On initialise un tableau, on stockera les messages d'erreur dedans
    $errors = [];

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

    // On retourne le tableau d'erreurs
    return $errors;
}


function addCustomer(
    string $lastname, 
    string $firstname,
    string $email,
    string $birthdate, 
    string $password,
    int $newsletter
)
{
    // Récupération des données du fichier JSON
    $customers = getDataFromJSON(FILENAME);

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
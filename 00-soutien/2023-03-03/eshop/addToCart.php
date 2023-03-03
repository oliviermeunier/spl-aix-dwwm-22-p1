<?php 

// Inclusion de l'autoload de composer
require '../vendor/autoload.php';

// Démarrage de la session
session_start();

// Récupérer les données du formulaire : id du produit / quantité
$quantity = $_POST['quantity'];
$idProduct = $_POST['id-product'];

// @TODO Validation 

// $product = compact('quantity', 'idProduct');

/////////////////////////////////////////////
// Enregistrer les données dans la session
//////////////////////////////////////////////

// Si le panier n'existe pas encore en session, on crée un tableau vide
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Au départ, on n'a pas trouvé le produit dans le panier 
$found = false;

/**
 * foreach ($tab as $element) {} : je récupère UNIQUEMENT les valeurs du tableau dans $element
 * foreach ($tab as $key => $element) {} : je récupère les clés (indices) dans $key et les valeurs dans $element
 */

 // On parcours les produits du panier
foreach ($_SESSION['cart'] as $index => $item) {

    // Si le produit qu'on souhaite ajouter est déjà présent dans le panier...
    if ($item['idProduct'] == $idProduct) {

        // ... on met simplement à jour sa quantité
        $_SESSION['cart'][$index]['quantity'] += $quantity;

        // On dit qu'on l'a trouvé
        $found = true;

        // On sort de la boucle
        break;
    }
}

/**
 * !false == true
 * !true == false
 */

// Si le produit n'existe pas déjà dans le panier...
// if ($found == false) {
if (!$found) {

    // Création d'un tableau pour stocker le produit dans le panier
    $product = [
        'quantity' => $quantity,
        'idProduct' => $idProduct
    ];

    // ... on l'ajoute
    // array_push($_SESSION['cart'], $product);
    $_SESSION['cart'][] = $product;
}
    


dump($_SESSION);

// Redirection vers l'index.php
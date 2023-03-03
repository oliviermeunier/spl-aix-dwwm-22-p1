<?php 

// Inclusion de l'autoload de composer
require '../vendor/autoload.php';

// Inclusion de la config
require 'config.php';

// Connexion à la base de données
$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Résultats de requêtes tableaux associatifs
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Erreurs SQL => Erreurs PHP


// Traitement du formulaire si le formulaire est soumis
if(!empty($_POST)) {

    // On récupère les données
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $price = $_POST['price'] * 100; // conversion en centimes
    $categoryId = $_POST['category'];

    // Validation


    // Insertion des données
    $sql = 'INSERT INTO product
            (name, description, image, price, categoryId, createdAt)
            VALUE (?, ?, ?, ?, ?, NOW())';

    $pdoStatement = $pdo->prepare($sql);
    $pdoStatement->execute([$name, $description, $image, $price, $categoryId]);    

    $newId = $pdo->lastInsertId();

    // Redirection
    header('Location: index.php');
    exit;
}

// Préparation de la requête
$sql = 'SELECT id, label # quels champs de la table je veux récupérer 
        FROM category # dans quelle table je vais chercher les données
        ORDER BY label'; // Tru des résultat par ordre alphabétique du label

$pdoStatement = $pdo->prepare($sql);
$pdoStatement->execute();
$categories = $pdoStatement->fetchAll();  

// Inclure le template
include 'addProduct.phtml';
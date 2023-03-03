<?php 

// Démarrage de la session
session_start();

// Inclusion de l'autoload de composer
require '../vendor/autoload.php';

// Inclusion de la config
require 'config.php';

// Inclusion du fichier de classe
require 'Cart.php';

// Connexion à la base de données
$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASS);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Résultats de requêtes tableaux associatifs
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Erreurs SQL => Erreurs PHP

// Sélection des produits (name, date de création, label de la catégorie, prix)
$sql = 'SELECT P.id AS productId, name, createdAt, price, label AS category
        FROM product AS P
        INNER JOIN category AS C
        ON P.categoryId = C.id
        ORDER BY name';

$pdoStatement = $pdo->prepare($sql);
$pdoStatement->execute();
$products = $pdoStatement->fetchAll();

// Récupérer le nombre de produits du panier
$nProducts = (new Cart())->count();

// Affichage
include 'index.phtml';
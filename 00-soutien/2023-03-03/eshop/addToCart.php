<?php 

// Inclusion de l'autoload de composer
require '../vendor/autoload.php';

// Inclusion du fichier de classe
require 'Cart.php';

// Démarrage de la session
session_start();

// Récupérer les données du formulaire : id du produit / quantité
$quantity = $_POST['quantity'];
$idProduct = $_POST['id-product'];

// @TODO Validation 

$cart = new Cart();
$cart->add($idProduct, $quantity);

// Redirection vers l'index.php
header('Location: index.php');
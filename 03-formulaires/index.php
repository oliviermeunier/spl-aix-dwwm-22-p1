<?php

// Traitements 

$message = null;

// Si le formulaire a été soumis... (si le tableau $_POST n'est pas vide)
if (!empty($_POST)) {

    // ... je récupère les données du formulaire
    $firstname = $_POST['firstname'];
    $date = $_POST['birthdate']; // string '2000-01-10'
    $date = new DateTimeImmutable($date); // Je crée un objet de la classe DateTimeImmutable
    $date = $date->format('d/m/Y');
    $language = $_POST['language'];

    $message = "Salut $firstname ! :) Tu es né le $date<br>Ton langage préféré est le $language";
}


$languages = ['HTML', 'CSS', 'JS', 'PHP', 'SQL'];


// Affichage 
include 'index.phtml';

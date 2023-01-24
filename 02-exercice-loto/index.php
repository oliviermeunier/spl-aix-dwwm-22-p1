<?php

// Traitement : créer la fonction tirageLoto() et générer un tirage

// Définition de la fonction tirageLoto()
function tirageLoto()
{
    // Je crée un tableau pour stocker mes nombres
    $tirage = [];

    // Je fais 6 itérations
    for ($i = 0; $i < 6; $i++) {

        do {
            // Je tire un nombre aléatoire...
            $number = rand(1, 49);
        }
        // ... tant que le nombre tiré est déjà présent dans le tableau
        while (in_array($number, $tirage));

        // Ici je suis certain que $number n'est PAS présent dans le tableau
        // Je peux l'ajouter
        $tirage[] = $number;
    }

    // Je retourne mon tableau
    return $tirage;
}

function tirageLoto2()
{
    $tirage = [];

    // Tant que je n'ai pas 6 nombres dans mon tableau...
    while (count($tirage) < 6) {

        // Je tire un nombre aléatoire entre 1 et 49
        $number = rand(1, 49);

        // Si je ne l'ai pas déjà...
        if (!in_array($number, $tirage)) {

            // Je l'ajoute dans le tableau
            $tirage[] = $number;
        }
    }

    // Ici je suis certain d'avoir 6 nombres dans le tableau $tirage
    return $tirage;
}

// J'appelle la fonction tirageLoto() et je récupère le résultat dans la variable $tirage
// $tirage = tirageLoto();


// var_dump($tirage);



$tirage = tirageLoto2();

// var_dump($tirage);


// Affichage : afficher le tirage dans le code HTML
include 'index.phtml';

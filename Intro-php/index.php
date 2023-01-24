<?php

// Traitements : récupérer des données d'un formulaire ou de la base de données

// Variables et constantes
$title = 'Bonjour PHP ! :)';
$message = 'Bonjour';

const TAUX_TVA = 0.2;
define('TAUX_TVA_2', 0.2);

// Types de données 

/**
 * string
 * int
 * float
 * bool
 * null
 * object
 * array
 */

$name = $message . ' Alfred';
$name = "$message Alfred";

$age = 20;

if ($age >= 18) {
    echo 'Vous êtes majeur';
} else {
    echo 'Vous êtes mineur';
}

// debug
var_dump($name);

switch ($age) {
    case 20:
        // ...
        break;

    case 40:
        // ...
        break;

    default:
        // ...

}

for ($i = 0; $i < 10; $i++) {
    echo '<p>Tour n°' . $i . '</p>';
}

$j = 0;

while ($j < 10) {
    echo '<p>Tour n°' . $j . '</p>';
    $j++;
}

/**
 * do {
 *  
 * } while(condition);
 */

$tab = [1, 2, 3];

foreach ($tab as $index => $item) {
    echo "<p>$index: $item</p>";
}

$fruits = array('pomme', 'poire');

array_push($fruits, 'framboise', 'cassis');
$fruits[] = 'pêche';

function sayHello(string $name = 'world'): string
{
    $msg = '<p>Hello ' . $name . '</p>';

    return $msg;
}

$result = sayHello('Alfred');

// function addFruit($fruits, $fruit)
// {
//     $fruits[] = $fruit;
// }

// addFruit($fruits, 'Kiwi');

// var_dump($fruits);

// Tableaux associatifs
$voiture = [
    'marque' => 'Toyota',
    'modele' => 'Prius',
    'immatriculation' => 'CG 897 PO',
    'annee' => 2012,
    'km' => 56484,
    'occasion' => true,
    'options' => ['ABS', 'Climatisation']
];

echo $voiture['marque'];
echo $voiture['options'][0]; // ABS

foreach ($voiture as $cle => $valeur) {
    if (is_array($valeur)) {
        echo '<p>' . $cle . ': ' . implode(', ', $valeur) . '</p>';
    } else {
        echo "<p>$cle: $valeur</p>";
    }
}

// Affichage
include 'index.phtml';

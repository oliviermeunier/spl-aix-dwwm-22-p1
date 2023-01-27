<?php 

/**
 * Rôle de PHP : principalement 2 choses :
 * 
 *  1. Gérer les données qui proviennent du client (navigateur) via un formulaire 
 *     Pour les enregistrer par exemple dans une base de données
 * 
 *  2. Restituer des données au client, envoyer des données vers le navigateur
 *     Dans le cas de figure le plus courant, PHP va envoyer le code HTML de la page au navigateur
 */

$title = 'Mon super article';
$age = 40;

/**
 * Structures de données : TABLEAUX et OBJETS
 * 
 * Tableaux : stocker des listes d'éléments de même nature
 */

$eleves = ['Alfred Dupont', 'Nicolas Martin'];

echo count($eleves) . '<br>';

var_dump($eleves[0]); // 'Alfred Dupont'

// Comment récupérer le dernier élément d'un tableau ?
// Quel est l'indice du dernier élément d'un tableau ?
echo 'Le dernier élément du tableau $eleves est : ' . $eleves[count($eleves)-1];

// Ajouter un nouvel élément au tableau
$eleves[] = 'Sophie Albert';
array_push($eleves, 'François Durant');

// Parcourir un tableau : "passer en revue" chaque élément (case) du tableau

// Avoir une boucle for
for ($index = 0; $index < count($eleves); $index++) {
    echo '<p>'.$eleves[$index].'</p>';
}

// Avec une boucle foreach
foreach ($eleves as $eleve) {
    echo '<p>'.$eleve.'</p>';
}

// Tableaux associatifs
$customer = [
    // CLE => VALEUR
    'id' => 1654987,
    'firstname' => 'Alfred',
    'lastname' => 'Dupont',
    'birthdate' =>'1985-03-09',
    'email' => 'alfred@gmail.com'
];

// Ajouter une nouvelle clé au tableau associatif
$customer['address'] = '12 allée des Cornouilles';

// Parcourir un tableau associatif
foreach ($customer as $key => $value) {
    echo '<p>'.$key.' : '.$value.'</p>';
}

/**
 * Fonctions 
 *
 * 2 types de fonctions : 
 *    - fonctions natives (elles sont déjà définies par PHP)
 *    - fonctions utilisateurs (celles que VOUS allez créer)
 */
$tab = [1,2,3,4,5];

shuffle($tab);

var_dump($tab);

// $keys = array_keys($customer);

// echo '<pre>';
// print_r($keys);
// echo '</pre>';

echo '<pre>';
print_r(array_keys($customer));
echo '</pre>';

// Intérêts de créer vos propres fonctions : 
// - DRY ne pas répéter de code
// - Organiser votre code, structure votre code

// Lorsqu'on crée une fonction, on la "déclare", ou on la "définit"
// /!\ Faire la différence entre "définir une fonction" et "appeler une fonction"

// DEFINITION DE LA FONCTION
function getFullname(string $firstname, string $lastname): string
{
    $fullname = "$firstname $lastname";

    return $fullname;
}

// APPEL / EXECUTION DE LA FONCTION
$customerFullname = getFullname($customer['firstname'], $customer['lastname']);

echo '<p>Customer Fullname : '.$customerFullname.'</p>';
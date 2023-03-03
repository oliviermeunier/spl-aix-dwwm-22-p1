<?php 

require '../vendor/autoload.php';

/**
 * 1 variable = 1 information
 * camelCase 
 * anglais
 */
$title = 'Mon titre';
$customerEmail = 'alfred@gmail.com';
$age = 40;
$price = 10.5;
$isValid = true; // ou false

/** 
 * Constantes
 * 2 manières de les déclarer : const ou define()
 */
const TAUX_TVA = 0.2;

define('MA_CONSTANTE', 10);

/**
 * Types de données de base
 *  - string
 *  - int
 *  - float
 *  - boolean 
 */

 /**
  * Structure de données
  *   - tableaux (array) : liste de quelque chose
  *   - objets : regrouper des informations hétérogènes concernant une même entité
  */

  /**
   * Tableaux : indices ou clés
   */
$tab = [];
$tab2 = array();
$tab3 = [10, 15, 46];
$tab3[3] = 56;
$tab3[0] = 5;
var_dump($tab3[2]); // 46
array_push($tab3, 27);
$tab3[] = 18; // équivalent de array_push()

$countTab3 = array_unshift($tab3, 0, 19, 34); // $countTab3 = [0, 19, 34, 10, 15, 46, 56, 27, 18];

var_dump(count($tab3));

$customer = [];
$customer['name'] = 'Alfred Dupont';
$customer['email'] = 'alfred@gmail.com';

$product = [
    // CLE  => VALEUR
    'name' => 'I Phone 16',
    'price' => 1600
];

$product['name'] = 'iphone 16';

/**
 * Parcourir un tableau
 */

// Pour chaque élément du tableau $tab3 que j'appelle $value et son indice $index... 
foreach ($tab3 as $index => $value) {
    echo '<p>' . $index . ' => ' . $value . '</p>';
}

// Pour chaque élément du tableau associatif $customer que j'appelle $value et sa clé $key... 
foreach ($customer as $key => $value) {
    echo '<p>' . $key . ' => ' . $value . '</p>';
}

/**
 * Fonctions utilisateur
 *  - ne pas répéter de code
 *  - structurer le code / découper le code en petits morceaux réutilisables
 *  - paramètres : 
 *          - ce dont la fonction a besoin pour faire son travail
 *          - ce qui peut changer à chaque appel de la fonction
 */

 // VERSION 1
// function arrayAdd(array $array, int $value)
// {
//     $newTab = [];
//     foreach ($array as $item) {
//         $newTab[] = $item + $value;
//     }

//     return $newTab;
// }

// VERSION 2
function arrayAdd(array $array, int $value = 1)
{
    $newTab = array_map(function($item) use ($value) {
        return $item + $value;
    }, $array);

    return $newTab;
}


$tab = [10, 20, 30];

dump($tab);

$newTab = arrayAdd($tab);

dump($tab);
dump($newTab);



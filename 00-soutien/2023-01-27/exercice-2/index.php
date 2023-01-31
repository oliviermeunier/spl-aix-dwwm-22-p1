<?php 

/**
 * Créer une fonction getMaxItem() qui retourne l'élément d'un tableau qui apparaît le plus de fois
 * dans le tableau. 
 * 
 * Exemple d'utilisation : 
 * $colors = ['blue', 'green', 'blue', 'red', 'orange', 'red', 'blue'];
 * echo getMaxItem($colors); // 'blue'
 */
function getMaxItem(array $arr)
{
    // On va créer un tableau associatif dans lequel on compte le nombre d'occurrence de chaque valeur du tableau
    $occurrences = [];

    // On parcours le tableau d'entrée
    foreach ($arr as $item) {

        // Si la clé correspondant à la valeur n'existe pas encore on la crée
        if (!array_key_exists($item, $occurrences)) {
            $occurrences[$item] = 0;
        }

        // On incrémente les occurrences de l'élément
        $occurrences[$item]++;
    }

    // Ensuite il faut récupérer la valeur meximale du tableau d'occurrence
    $maxItem = $arr[0];
    foreach($occurrences as $item => $occurrence) {
        if($occurrence > $occurrences[$maxItem]) {
            $maxItem = $item;
        }
    }

    return $maxItem;

}

// Test de la fonction
$colors = ['blue', 'green', 'blue', 'red', 'orange', 'red', 'blue', 'red', 'red'];
echo '<p>'.getMaxItem($colors).'</p>'; // 'blue'


// Autre version
function getMaxItem2(array $arr)
{
    // On récupère le nombre d'occurrences de chaque valeur du tableau 
    $occurrences = array_count_values($arr);

    // On tri le tableau en ordre décroissant en conservant l'association des clés
    arsort($occurrences);

    // On récupère les clés du tableau d'occurrences
    $keys = array_keys($occurrences);

    // On retourne la première clé
    return $keys[0];
}

// Test de la fonction
$colors = ['blue', 'green', 'blue', 'red', 'orange', 'red', 'blue', 'red', 'red'];
echo '<p>'.getMaxItem2($colors).'</p>'; // 'blue'
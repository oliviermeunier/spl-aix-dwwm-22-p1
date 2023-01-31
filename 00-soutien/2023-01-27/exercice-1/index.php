<?php 

/**
 * Créer une fonction array_average() qui calcule la moyenne des nombres contenus dans un tableau.
 * 
 * Exemple d'utilisation : 
 * $notes = [10, 12];
 * var_dump(array_average($notes)); // 11
 */
function array_average(array $arr): float 
{
    // 1. On calcule la somme des éléments du tableau
    $sum = 0;
    foreach ($arr as $item) {
        $sum += $item;
    }

    // 2. On divise par le nombre d'éléments du tableau
    $avg = $sum / count($arr);

    return $avg;
}

// Test de la fonction
echo "<p>La moyenne des éléments du tableau [10, 15, 12] est : " .array_average([10, 15, 12]).'</p>';

// Autre version en utilisant la fonction array_sum() de PHP
function array_average2(array $arr): float 
{
    return array_sum($arr) / count($arr);
}

// Test de la fonction
echo "<p>La moyenne des éléments du tableau [10, 15, 12] est : " .array_average2([10, 15, 12]).'</p>';
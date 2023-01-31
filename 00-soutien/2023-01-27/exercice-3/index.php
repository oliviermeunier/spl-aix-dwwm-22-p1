<?php 

/**
 * Créer une fonction longestWord() qui retourne le mot le plus long d'un tableau
 * 
 * Exemple d'utilisation :
 * 
 * $words = ['Émerillonné', 'calembredaines', 'Équanimité', 'myélosaccoradiculographie'];
 * echo longestWord($words); // "myélosaccoradiculographie"
 */
function longestWord(array $arr) 
{
    
    // Au départ on dit que le mot le plus long est le premier
    $maxWord = $arr[0];

    // On parcours les mots du tableau
    foreach ($arr as $word) {

        // Si le mot courant $word est plus long que le mot le plus long trouvé pour l'instant...
        if(mb_strlen($word) > mb_strlen($maxWord)) {

            // ... le mot courant prend la place du $maxWord !
            $maxWord = $word;
        }
    }

    return $maxWord;
}

// Test de la fonction
$words = ['Émerillonné', 'calembredaines', 'Équanimité', 'myélosaccoradiculographie'];
echo '<p>'.longestWord($words).'</p>'; // "myélosaccoradiculographie"


// Autre version
function longestWord2(array $arr) 
{
    return array_reduce($arr, function($maxWord, $word) {
        return mb_strlen($word) > mb_strlen($maxWord) ? $word : $maxWord;
    }, '');
}

// Test de la fonction
$words = ['Émerillonné', 'calembredaines', 'Équanimité', 'myélosaccoradiculographie'];
echo '<p>'.longestWord2($words).'</p>'; // "myélosaccoradiculographie"
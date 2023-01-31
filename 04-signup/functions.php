<?php 

/**
 * Vérifie si l'email existe dans le fichier de customers
 */
function emailExists(string $email, array $customers): bool
{
    // On vérifie l'existance de l'email seulement si celui-ci est rempli et valide
    foreach ($customers as $customer) {
        if($customer['email'] == $email) {
            return true;
        }
    }

    return false;
}
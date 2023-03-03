<?php 

class Cart {    

    public function __construct()
    {
        // Démarrer la session si la session n'est pas démarrée
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Initialisation du panier en session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function add(int $idProduct, int $quantity)
    {
        // Si le produit existe déjà dans le panier
        if ($this->getProduct($idProduct)) {

            // On met simplement à jour la quantité
            $this->addQuantity($quantity, $idProduct);
        }
        // Sinon, si le produit n'existe pas...
        else {

            // On ajoute un nouveau produit au panier on l'ajoute
            $_SESSION['cart'][] = [
                'quantity' => $quantity,
                'idProduct' => $idProduct
            ];
        }
    }

    public function addQuantity(int $quantity, int $idProduct): bool 
    {
         // On parcours les produits du panier
        foreach ($_SESSION['cart'] as $index => $item) {

            // Si le produit qu'on souhaite ajouter est déjà présent dans le panier...
            if ($item['idProduct'] == $idProduct) {

                // ... on met simplement à jour sa quantité
                $_SESSION['cart'][$index]['quantity'] += $quantity;

                // On sort de la boucle
                return true;
            }
        }

        return false;
    }

    public function getProduct(int $idProduct): ?array 
    {
         // On parcours les produits du panier
        foreach ($_SESSION['cart'] as $product) {

            // Si le produit qu'on souhaite ajouter est déjà présent dans le panier...
            if ($product['idProduct'] == $idProduct) {
                return $product;
            }
        }

        // Ici je suis certain que le produit n'a pas été trouvé
        return null;
    }

    public function count() 
    {
        return count($_SESSION['cart']);
    }

}
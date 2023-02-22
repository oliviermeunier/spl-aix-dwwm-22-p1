<?php 

/**
 * Connexion à la base de données
 */
function getPDOConnection() {

    // Construction du Data Source Name
    $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';charset=utf8';

    // Tableau d'options pour la connexion PDO
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    // Création de la connexion PDO (création d'un objet PDO)
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    $pdo->exec('SET NAMES UTF8');
    
    return $pdo;
}

/**
 * Sélectionne tous les articles
 */
function getAllArticles()
{
    // Connexion à la BDD
    $pdo = getPDOConnection();

    $sql = 'SELECT * 
            FROM article AS A
            INNER JOIN category AS C 
            ON A.categoryId = C.idCategory 
            ORDER BY createdAt DESC 
            LIMIT 3';

    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchAll();
} 
<?php 

// 1. Déclaration du namespace 
namespace App\Core;

// 2. Import de classes
use PDO;

// 3. Définition de la classe Database
class Database {

    /**
     * Stocke l'objet PDO
     */
    private PDO $pdo;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->pdo = $this->getPDOConnection();
    }

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
     * Prépare et exécute une requête SQL
     */
    function prepareAndExecute(string $sql, array $values = [])
    {
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->execute($values);

        return $pdoStatement;
    }

    /**
     * Exécute une requête de sélection et retourne UN résultat
     */
    function getOneResult(string $sql, array $values = [])
    {
        $pdoStatement = $this->prepareAndExecute($sql, $values);
        $result = $pdoStatement->fetch();

        return $result;
    }

    /**
     * Exécute une requête de sélection et retourne TOUS les résultats
     */
    function getAllResults(string $sql, array $values = [])
    {
        $pdoStatement = $this->prepareAndExecute($sql, $values);
        $results = $pdoStatement->fetchAll();

        return $results;
    }
}



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

/**
 * Sélectionne un article à partir de son id
 */
function getOneArticle(int $idArticle)
{
    // Connexion à la BDD
    $pdo = getPDOConnection();

    $sql = 'SELECT * 
            FROM article AS A
            INNER JOIN category AS C 
            ON A.categoryId = C.idCategory
            WHERE idArticle = ?'; 

    $query = $pdo->prepare($sql);
    $query->execute([$idArticle]);

    $result = $query->fetch();

    return $result;
}

function addComment(string $nickname, string $content, int $idArticle)
{
    // Connexion à la BDD
    $pdo = getPDOConnection();

    $sql = 'INSERT INTO comment (nickname, content, articleId, createdAt)
            VALUES (?, ?, ?, NOW())'; 

    $query = $pdo->prepare($sql);
    $query->execute([$nickname, $content, $idArticle]);
}

function getCommentsByArticleId(int $idArticle)
{
    // Connexion à la BDD
    $pdo = getPDOConnection();

    $sql = 'SELECT * 
            FROM comment 
            WHERE articleId = ?
            ORDER BY createdAt DESC';

    $query = $pdo->prepare($sql);
    $query->execute([$idArticle]);

    return $query->fetchAll();
}

function validateCommentForm(string $nickname, string $content)
{
    $errors = [];

    if (!$nickname) {
        $errors['nickname'] = 'Le champ "pseudo" est obligatoire';
    }

    if (strlen($content) < 10) {
        $errors['content'] = 'Le commentaire doit comporter au moins 10 caractères';
    }

    return $errors;
}
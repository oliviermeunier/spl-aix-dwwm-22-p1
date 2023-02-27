<?php 

/**
 * Sélectionne tous les articles
 */
function getAllArticles()
{
    $db = new Database();

    $sql = 'SELECT * 
            FROM article AS A
            INNER JOIN category AS C 
            ON A.categoryId = C.idCategory 
            ORDER BY createdAt DESC 
            LIMIT 3';

    return $db->getAllResults($sql);
} 

/**
 * Sélectionne un article à partir de son id
 */
function getOneArticle(int $idArticle)
{
    $db = new Database();

    $sql = 'SELECT * 
            FROM article AS A
            INNER JOIN category AS C 
            ON A.categoryId = C.idCategory
            WHERE idArticle = ?'; 

    return $db->getOneResult($sql, [$idArticle]);
}

function addComment(string $nickname, string $content, int $idArticle)
{
    $db = new Database();

    $sql = 'INSERT INTO comment 
            (nickname, content, articleId, createdAt)
            VALUES (?, ?, ?, NOW())'; 

    $db->prepareAndExecute($sql, [$nickname, $content, $idArticle]);
}

function getCommentsByArticleId(int $idArticle)
{
    $db = new Database();

    $sql = 'SELECT * 
            FROM comment 
            WHERE articleId = ?
            ORDER BY createdAt DESC';

    return $db->getAllResults($sql, [$idArticle]);
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